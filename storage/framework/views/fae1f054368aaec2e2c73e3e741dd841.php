<header class="rg-header" id="rg-header">
    <div class="rg-header__top d-none d-lg-block">
        <div class="container-premium">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->phone_primary): ?>
                        <a href="tel:<?php echo e($site->phone_primary); ?>"><i class="bi bi-telephone-fill me-2"></i><?php echo e($site->phone_primary); ?></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->whatsapp): ?>
                        <span class="top-divider"></span>
                        <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $site->whatsapp)); ?>" target="_blank" rel="noopener" style="color:#25D366;"><i class="bi bi-whatsapp me-1"></i><?php echo e($site->whatsapp); ?></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->email): ?>
                        <span class="top-divider"></span>
                        <a href="mailto:<?php echo e($site->email); ?>"><i class="bi bi-envelope-fill me-2"></i><?php echo e($site->email); ?></a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="d-flex align-items-center">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->address): ?>
                        <span><i class="bi bi-geo-alt-fill me-2"></i><?php echo e($site->city ?? ''); ?><?php echo e($site->state ? ', ' . $site->state : ''); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="rg-header__bar">
        <div class="container-premium">
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?php echo e(route('frontend.home')); ?>" class="rg-header__logo text-decoration-none">
                    <span class="rg-header__logo-bg">
                        <img src="<?php echo e(asset('storage/' . $site->logo)); ?>" alt="<?php echo e($site->company_name); ?>" style="max-width: <?php echo e($site->logo_width ?? 200); ?>px">
                        <span class="logo-text"><span>R.G.</span> Ambulance Service</span>
                    </span>
                </a>

                <nav class="rg-header__nav d-none d-lg-flex align-items-center">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $headerNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->children->count()): ?>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle <?php echo e(request()->url() === url($item->link) ? 'active' : ''); ?>" href="#" data-bs-toggle="dropdown"><?php echo e($item->label); ?></a>
                                <ul class="dropdown-menu">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a class="dropdown-item" href="<?php echo e(url($child->link)); ?>"><?php echo e($child->label); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <a class="nav-link <?php echo e(request()->url() === url($item->link) ? 'active' : ''); ?>" href="<?php echo e(url($item->link)); ?>"><?php echo e($item->label); ?></a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <a class="nav-link <?php echo e(request()->routeIs('frontend.home') ? 'active' : ''); ?>" href="<?php echo e(route('frontend.home')); ?>">Home</a>
                        <a class="nav-link <?php echo e(request()->routeIs('frontend.about') ? 'active' : ''); ?>" href="<?php echo e(route('frontend.about')); ?>">About</a>
                        <a class="nav-link <?php echo e(request()->routeIs('frontend.services*') ? 'active' : ''); ?>" href="<?php echo e(route('frontend.services')); ?>">Services</a>
                        <a class="nav-link <?php echo e(request()->routeIs('frontend.fleet*') ? 'active' : ''); ?>" href="<?php echo e(route('frontend.fleet')); ?>">Fleet</a>
                        <a class="nav-link <?php echo e(request()->routeIs('frontend.contact') ? 'active' : ''); ?>" href="<?php echo e(route('frontend.contact')); ?>">Contact</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </nav>

                <div class="d-flex align-items-center gap-3">
                    <div class="rg-header__cta d-none d-lg-block">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->phone_primary): ?>
                            <a href="tel:<?php echo e($site->phone_primary); ?>" class="btn-emergency">
                                <span class="emergency-ring"></span>
                                <i class="bi bi-telephone-fill animate-shake" style="display:inline-block;"></i>
                                <span class="emergency-text">
                                    <strong>24/7 Emergency</strong>
                                    <small><?php echo e($site->phone_primary); ?></small>
                                </span>
                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <button class="rg-header__toggle d-lg-none" data-mobile-toggle aria-label="Open menu">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="rg-mobile-nav">
    <button class="btn btn-link text-white position-absolute top-0 end-0 m-4 fs-3" data-mobile-close aria-label="Close menu">
        <i class="bi bi-x-lg"></i>
    </button>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $headerNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a class="mobile-nav-link" href="<?php echo e(url($item->link)); ?>"><?php echo e($item->label); ?></a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="mobile-nav-link ps-4" href="<?php echo e(url($child->link)); ?>" style="font-size: 1.25rem;"><?php echo e($child->label); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <a class="mobile-nav-link" href="<?php echo e(route('frontend.home')); ?>">Home</a>
        <a class="mobile-nav-link" href="<?php echo e(route('frontend.about')); ?>">About</a>
        <a class="mobile-nav-link" href="<?php echo e(route('frontend.services')); ?>">Services</a>
        <a class="mobile-nav-link" href="<?php echo e(route('frontend.fleet')); ?>">Fleet</a>
        <a class="mobile-nav-link" href="<?php echo e(route('frontend.contact')); ?>">Contact</a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->phone_primary): ?>
        <a class="btn-rg d-inline-flex align-items-center gap-2 mt-4" href="tel:<?php echo e($site->phone_primary); ?>" style="background:linear-gradient(135deg,#dc2626,#b91c1c);color:#fff;border:none;border-radius:50px;padding:0.75rem 2rem;font-weight:700;box-shadow:0 4px 20px rgba(220,38,38,0.35);">
            <i class="bi bi-telephone-fill"></i> <?php echo e($site->phone_primary); ?>

        </a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/header.blade.php ENDPATH**/ ?>