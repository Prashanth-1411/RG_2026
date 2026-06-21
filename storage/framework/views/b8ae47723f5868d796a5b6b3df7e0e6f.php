<div class="rg-testimonial-card" data-aos="<?php echo e($aos ?? 'fade-up'); ?>" data-aos-delay="<?php echo e($delay ?? 0); ?>">
    <div class="rg-testimonial-card__stars">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= ($testimonial->rating ?? 5); $i++): ?>
            <i class="bi bi-star-fill"></i>
        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <p class="rg-testimonial-card__text">"<?php echo e($testimonial->content); ?>"</p>
    <div class="rg-testimonial-card__author">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testimonial->image): ?>
            <img src="<?php echo e(str_starts_with($testimonial->image, 'http') ? $testimonial->image : asset('storage/' . $testimonial->image)); ?>" alt="<?php echo e($testimonial->name); ?>">
        <?php else: ?>
            <div class="rg-card__avatar">
                <?php echo e(strtoupper(substr($testimonial->name, 0, 1))); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div>
            <div class="author-name"><?php echo e($testimonial->name); ?></div>
            <div class="author-role"><?php echo e($testimonial->designation ?? $testimonial->position ?? ''); ?></div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/testimonial-card.blade.php ENDPATH**/ ?>