<footer class="rg-footer">
    <div class="container-premium">
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up">
                <div class="rg-footer__brand">
                    <img src="<?php echo e(asset('storage/' . $site->logo)); ?>" alt="<?php echo e($site->company_name); ?>" class="footer-logo" style="max-width:220px;">
                    <p><?php echo e($content['site_description'] ?? $site->tagline ?? ''); ?></p>
                        <div class="rg-footer__social">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->facebook): ?><a href="<?php echo e($site->facebook); ?>" target="_blank" rel="noopener"><i class="bi bi-facebook animate-float" style="display:inline-block;"></i></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->instagram): ?><a href="<?php echo e($site->instagram); ?>" target="_blank" rel="noopener"><i class="bi bi-instagram animate-bounce" style="display:inline-block;"></i></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->linkedin): ?><a href="<?php echo e($site->linkedin); ?>" target="_blank" rel="noopener"><i class="bi bi-linkedin animate-pulse" style="display:inline-block;"></i></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->youtube): ?><a href="<?php echo e($site->youtube); ?>" target="_blank" rel="noopener"><i class="bi bi-youtube animate-shake" style="display:inline-block;"></i></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->twitter): ?><a href="<?php echo e($site->twitter); ?>" target="_blank" rel="noopener"><i class="bi bi-twitter-x animate-wiggle" style="display:inline-block;"></i></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                </div>
            </div>

            <div class="col-6 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                <h6 class="rg-footer__heading">Quick Links</h6>
                <ul class="rg-footer__links">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $footerNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li><a href="<?php echo e(url($item->link)); ?>"><?php echo e($item->label); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li><a href="<?php echo e(route('frontend.about')); ?>">About Us</a></li>
                        <li><a href="<?php echo e(route('frontend.services')); ?>">Services</a></li>
                        <li><a href="<?php echo e(route('frontend.fleet')); ?>">Our Fleet</a></li>
                        <li><a href="<?php echo e(route('frontend.contact')); ?>">Contact</a></li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>

            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <h6 class="rg-footer__heading">Our Services</h6>
                <ul class="rg-footer__links">
                    <li><a href="<?php echo e(route('frontend.services')); ?>">Ambulance Services</a></li>
                    <li><a href="<?php echo e(route('frontend.fleet')); ?>">Fleet & Transport</a></li>
                    <li><a href="<?php echo e(route('frontend.mortuary')); ?>">Mortuary Services</a></li>
                    <li><a href="<?php echo e(route('frontend.faq')); ?>">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <h6 class="rg-footer__heading">Contact Us</h6>
                <div class="rg-footer__contact">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->address): ?>
                        <div class="contact-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <div>
                                <span><?php echo e($site->address); ?><?php echo e($site->city ? ', ' . $site->city : ''); ?><?php echo e($site->pincode ? ' - ' . $site->pincode : ''); ?></span>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->phone_primary): ?>
                        <div class="contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            <div><a href="tel:<?php echo e($site->phone_primary); ?>"><?php echo e($site->phone_primary); ?></a></div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->email): ?>
                        <div class="contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <div><a href="mailto:<?php echo e($site->email); ?>"><?php echo e($site->email); ?></a></div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->whatsapp): ?>
                        <div class="contact-item">
                            <i class="bi bi-whatsapp"></i>
                            <div><a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $site->whatsapp)); ?>" target="_blank"><?php echo e($site->whatsapp); ?></a></div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <div class="rg-footer__bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <span><?php echo e($content['footer_text'] ?? '© ' . date('Y') . ' ' . ($site->company_name ?? 'R.G. Ambulance Service') . '. All rights reserved.'); ?></span>
                <span>Designed by <a href="https://prashanthwebtech.com" target="_blank" rel="noopener">Prashanth Web Tech</a></span>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/footer.blade.php ENDPATH**/ ?>