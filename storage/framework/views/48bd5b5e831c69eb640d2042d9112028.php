<div class="rg-card" data-aos="<?php echo e($aos ?? 'fade-up'); ?>" data-aos-delay="<?php echo e($delay ?? 0); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->imageUrl()): ?>
        <div class="rg-card__image">
            <img src="<?php echo e($service->imageUrl()); ?>" alt="<?php echo e($service->title); ?>" loading="lazy">
            <div class="card-overlay"></div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="rg-card__body">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->icon): ?>
            <div class="rg-card__icon animate-float" style="animation-delay:<?php echo e(($delay ?? 0) / 1000); ?>s"><i class="bi bi-<?php echo e($service->icon); ?>"></i></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <h3 class="rg-card__title"><?php echo e($service->title); ?></h3>
        <p class="rg-card__text"><?php echo e($service->short_description); ?></p>
        <a href="<?php echo e(route('frontend.services.show', $service->slug)); ?>" class="rg-card__link">
            Learn More <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/service-card.blade.php ENDPATH**/ ?>