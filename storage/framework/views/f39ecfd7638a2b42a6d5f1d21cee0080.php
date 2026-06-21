<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php
        $pageTitle = $seo?->meta_title ?? ($content['site_name'] ?? $site?->company_name ?? 'R.G. Ambulance Service');
        $pageDesc = $seo?->meta_description ?? ($content['site_description'] ?? $site?->tagline ?? '');
        $pageKeywords = $seo?->meta_keywords ?? '';
        $ogImage = $seo?->og_image ?? ($site?->logo ? asset('storage/' . $site->logo) : '');
    ?>

    <title><?php echo $__env->yieldContent('title', $pageTitle); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', $pageDesc); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pageKeywords): ?><meta name="keywords" content="<?php echo e($pageKeywords); ?>"><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($seo): ?>
        <meta property="og:title" content="<?php echo e($seo->og_title ?? $pageTitle); ?>">
        <meta property="og:description" content="<?php echo e($seo->og_description ?? $pageDesc); ?>">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ogImage): ?><meta property="og:image" content="<?php echo e($ogImage); ?>"><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($seo?->canonical_url): ?><link rel="canonical" href="<?php echo e($seo->canonical_url); ?>"><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->favicon): ?>
        <link rel="icon" href="<?php echo e(asset('storage/' . $site->favicon)); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            <?php echo \App\Services\ThemeService::cssVariables(); ?>

        }
    </style>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/scss/app.scss', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div id="page-loader">
        <div class="loader-brand">
            <img src="<?php echo e(asset('storage/' . $site->logo)); ?>" alt="<?php echo e($site->company_name ?? 'Loading...'); ?>" style="max-height:60px;">
            <div class="loader-line"></div>
        </div>
    </div>

    <?php echo $__env->make('frontend.components.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('frontend.components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->whatsapp): ?>
    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $site->whatsapp)); ?>?text=<?php echo e(urlencode('Hi! I need ambulance assistance. Please help.')); ?>"
       target="_blank"
       rel="noopener"
       class="rg-whatsapp"
       aria-label="Chat on WhatsApp">
        <span class="rg-whatsapp__label">Chat with us</span>
        <span class="rg-whatsapp__icon"><i class="bi bi-whatsapp"></i></span>
    </a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>