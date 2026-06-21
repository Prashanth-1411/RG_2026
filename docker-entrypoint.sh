#!/bin/bash
set -e

cd /var/www/html

# Create .env from template if missing
if [ ! -f .env ]; then
    cp .env.example .env

    # Override with environment variables
    for var in APP_NAME APP_ENV APP_DEBUG APP_URL DB_CONNECTION DB_HOST DB_PORT DB_DATABASE DB_USERNAME DB_PASSWORD SESSION_DRIVER CACHE_STORE QUEUE_CONNECTION LOG_CHANNEL; do
        val="${!var}"
        [ -z "$val" ] && continue
        case "$var" in
            APP_URL) sed -i "s|APP_URL=.*|APP_URL=$val|" .env ;;
            APP_KEY) ;;
            *) sed -i "s/^#$var=.*/$var=$val/; s/^$var=.*/$var=$val/" .env ;;
        esac
    done
fi

# Generate or set APP_KEY
if [ -n "$APP_KEY" ]; then
    sed -i "s|APP_KEY=.*|APP_KEY=$APP_KEY|" .env
elif ! grep -q "APP_KEY=base64" .env 2>/dev/null; then
    php artisan key:generate --force
fi

# Wait for database and run migrations
if [ -n "$DB_HOST" ]; then
    echo "Waiting for database connection..."
    for i in $(seq 1 15); do
        php artisan db:show --quiet 2>&1 && break
        echo "Attempt $i/15 — database not ready, retrying in 3s..."
        sleep 3
    done
    echo "Running migrations..."
    php artisan migrate --force
fi

# Storage link
php artisan storage:link --force 2>/dev/null || true

# Cache for production
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
fi

exec "$@"
