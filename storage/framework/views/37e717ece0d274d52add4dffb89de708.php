<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.components.page-hero', [
    'title' => $category->name,
    'description' => $category->description,
    'breadcrumb' => $category->name,
    'heroImage' => $category->imageUrl(),
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="rg-fleet bg-premium-light">
    <div class="container-premium">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->subtitle): ?>
            <div class="text-center mb-3" data-aos="fade-up">
                <span class="section-subtitle justify-content-center"><?php echo e($category->subtitle); ?></span>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="rg-fleet__grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php echo $__env->make('frontend.components.fleet-item-card', ['item' => $item, 'delay' => $loop->index * 100, 'aos' => 'zoom-in-up'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted-premium">No items available in this category.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="text-center mt-3" data-aos="fade-up">
            <a href="<?php echo e(route('frontend.fleet')); ?>" class="btn-rg btn-rg-ghost">
                <i class="bi bi-arrow-left"></i> Back to Fleet
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->phone_primary): ?>
                <a href="tel:<?php echo e($site->phone_primary); ?>" class="btn-rg btn-rg-primary ms-3">
                    <i class="bi bi-telephone-fill"></i> Enquire Now
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

<?php echo $__env->make('frontend.components.cta-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/fleet/category.blade.php ENDPATH**/ ?>