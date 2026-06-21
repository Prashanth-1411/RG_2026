<section class="rg-page-hero">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($heroImage) && $heroImage): ?>
        <div class="rg-page-hero__bg"><img src="<?php echo e($heroImage); ?>" alt=""></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="rg-page-hero__overlay"></div>
    <div class="container-premium">
        <div class="rg-page-hero__content" data-aos="fade-up">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($breadcrumb)): ?>
                <nav class="rg-page-hero__breadcrumb">
                    <a href="<?php echo e(route('frontend.home')); ?>">Home</a>
                    <span>/</span>
                    <span class="active"><?php echo e($breadcrumb); ?></span>
                </nav>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <h1 class="rg-page-hero__title"><?php echo e($title); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($description) && $description): ?>
                <p class="rg-page-hero__desc"><?php echo e($description); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/page-hero.blade.php ENDPATH**/ ?>