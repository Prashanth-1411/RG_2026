<div class="rg-fleet-card" data-aos="<?php echo e($aos ?? 'fade-up'); ?>" data-aos-delay="<?php echo e($delay ?? 0); ?>">
    <div class="rg-card__image">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->imageUrl()): ?>
            <img src="<?php echo e($category->imageUrl()); ?>" alt="<?php echo e($category->name); ?>" loading="lazy">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div class="card-overlay"></div>
    </div>
    <div class="rg-card__body">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->subtitle): ?>
            <span class="rg-badge mb-3"><?php echo e($category->subtitle); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <h3 class="rg-card__title"><?php echo e($category->name); ?></h3>
        <p class="rg-card__text"><?php echo e(Str::limit($category->description, 160)); ?></p>
        <a href="<?php echo e(route('frontend.fleet.show', $category->slug)); ?>" class="rg-card__link mt-3">
            View Details <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/fleet-category-card.blade.php ENDPATH**/ ?>