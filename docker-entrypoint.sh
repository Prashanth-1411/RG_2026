#!/bin/bash
set -e

# Create .env from environment if not exists
if [ ! -f /var/www/html/.env ]; then
    cp /var/www/html/.env.example /var/www/html/.env

    # Override with Render/container environment variables
    if [ -n "$APP_NAME" ]; then sed -i "s/APP_NAME=.*/APP_NAME=$APP_NAME/" /var/www/html/.env; fi
    if [ -n "$APP_ENV" ]; then sed -i "s/APP_ENV=.*/APP_ENV=$APP_ENV/" /var/www/html/.env; fi
    if [ -n "$APP_DEBUG" ]; then sed -i "s/APP_DEBUG=.*/APP_DEBUG=$APP_DEBUG/" /var/www/html/.env; fi
    if [ -n "$APP_URL" ]; then sed -i "s|APP_URL=.*|APP_URL=$APP_URL|" /var/www/html/.env; fi
    if [ -n "$DB_CONNECTION" ]; then sed -i "s/DB_CONNECTION=.*/DB_CONNECTION=$DB_CONNECTION/" /var/www/html/.env; fi
    if [ -n "$DB_HOST" ]; then sed -i "s/# DB_HOST=.*/DB_HOST=$DB_HOST/; s/DB_HOST=.*/DB_HOST=$DB_HOST/" /var/www/html/.env; fi
    if [ -n "$DB_PORT" ]; then sed -i "s/# DB_PORT=.*/DB_PORT=$DB_PORT/; s/DB_PORT=.*/DB_PORT=$DB_PORT/" /var/www/html/.env; fi
    if [ -n "$DB_DATABASE" ]; then sed -i "s/# DB_DATABASE=.*/DB_DATABASE=$DB_DATABASE/; s/DB_DATABASE=.*/DB_DATABASE=$DB_DATABASE/" /var/www/html/.env; fi
    if [ -n "$DB_USERNAME" ]; then sed -i "s/# DB_USERNAME=.*/DB_USERNAME=$DB_USERNAME/; s/DB_USERNAME=.*/DB_USERNAME=$DB_USERNAME/" /var/www/html/.env; fi
    if [ -n "$DB_PASSWORD" ]; then sed -i "s/# DB_PASSWORD=.*/DB_PASSWORD=$DB_PASSWORD/; s/DB_PASSWORD=.*/DB_PASSWORD=$DB_PASSWORD/" /var/www/html/.env; fi
    if [ -n "$SESSION_DRIVER" ]; then sed -i "s/SESSION_DRIVER=.*/SESSION_DRIVER=$SESSION_DRIVER/" /var/www/html/.env; fi
    if [ -n "$CACHE_STORE" ]; then sed -i "s/CACHE_STORE=.*/CACHE_STORE=$CACHE_STORE/" /var/www/html/.env; fi
    if [ -n "$QUEUE_CONNECTION" ]; then sed -i "s/QUEUE_CONNECTION=.*/QUEUE_CONNECTION=$QUEUE_CONNECTION/" /var/www/html/.env; fi
    if [ -n "$LOG_CHANNEL" ]; then sed -i "s/LOG_CHANNEL=.*/LOG_CHANNEL=$LOG_CHANNEL/" /var/www/html/.env; fi
fi

# Generate app key if not set
if ! grep -q "APP_KEY=base64" /var/www/html/.env 2>/dev/null && [ -z "$APP_KEY" ]; then
    php /var/www/html/artisan key:generate --force
elif [ -n "$APP_KEY" ]; then
    sed -i "s|APP_KEY=.*|APP_KEY=$APP_KEY|" /var/www/html/.env
fi

# Create storage link
php /var/www/html/artisan storage:link --force 2>/dev/null || true

# Run migrations (ignore if already ran)
php /var/www/html/artisan migrate --force 2>/dev/null || true

# Cache Laravel config for performance (skip if APP_KEY is still placeholder)
if grep -q "APP_KEY=" /var/www/html/.env && [ "$APP_ENV" = "production" ]; then
    php /var/www/html/artisan config:cache 2>/dev/null || true
    php /var/www/html/artisan route:cache 2>/dev/null || true
    php /var/www/html/artisan view:cache 2>/dev/null || true
    php /var/www/html/artisan event:cache 2>/dev/null || true
fi

exec "$@"
