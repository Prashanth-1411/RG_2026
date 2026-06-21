<?php
    $name = $item->name ?? $item->title ?? '';
    $image = method_exists($item, 'mainImageUrl') ? $item->mainImageUrl() : (method_exists($item, 'imageUrl') ? $item->imageUrl() : null);
    $price = $item->price ?? null;
    $isAvailable = $item->is_available ?? null;
    $features = $item->features ?? null;
?>

<div class="rg-fleet-card" data-aos="<?php echo e($aos ?? 'fade-up'); ?>" data-aos-delay="<?php echo e($delay ?? 0); ?>">
    <div class="rg-card__image">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image): ?>
            <img src="<?php echo e($image); ?>" alt="<?php echo e($name); ?>" loading="lazy">
            <div class="card-overlay"></div>
        <?php else: ?>
            <div class="rg-card__image-placeholder">
                <i class="bi bi-image text-muted"></i>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isAvailable !== null): ?>
            <div class="rg-fleet-card__status <?php echo e($isAvailable ? 'available' : 'unavailable'); ?>">
                <?php echo e($isAvailable ? 'Available' : 'On Request'); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <div class="rg-card__body d-flex flex-column">
        <h3 class="rg-card__title rg-card__title--sm"><?php echo e($name); ?></h3>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($price): ?>
            <div class="rg-equipment-card__price mb-2">₹<?php echo e(number_format($price, 0)); ?><small class="rg-card__price-unit">/day</small></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <p class="rg-card__text flex-grow-1"><?php echo e(Str::limit($item->description ?? '', 120)); ?></p>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($features): ?>
            <div class="rg-fleet-card__specs">
                <?php
                    $featureList = is_string($features) ? explode("\n", $features) : (is_array($features) ? $features : []);
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_slice($featureList, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(trim($feature)): ?>
                        <span class="spec-tag"><?php echo e(trim($feature)); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <a href="tel:<?php echo e($site->phone_primary ?? ''); ?>" class="rg-card__link mt-3">
            <i class="bi bi-telephone-fill"></i> Enquire Now
        </a>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/fleet-item-card.blade.php ENDPATH**/ ?>