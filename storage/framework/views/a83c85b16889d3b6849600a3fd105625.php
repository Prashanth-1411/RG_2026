<?php $__env->startSection('content'); ?>
<?php $page = \App\Models\Page::where('page_name', 'about')->first(); ?>

<?php echo $__env->make('frontend.components.page-hero', [
    'title' => $content['about_title'] ?? $page?->heading ?? 'About Us',
    'description' => $content['about_subtitle'] ?? $page?->subheading ?? '',
    'breadcrumb' => 'About',
    'heroImage' => $page?->hero_image ? asset('storage/' . $page->hero_image) : null,
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="rg-about" style="padding-top:0;">
    <div class="container-premium">

        <div class="row g-3 mb-3">
            <div class="col-md-6" data-aos="flip-left">
                <div class="rg-card h-100">
                    <div class="rg-card__body">
                        <div class="rg-card__icon"><i class="bi bi-bullseye animate-spin-slow" style="display:inline-block;"></i></div>
                        <h3 class="rg-card__title"><?php echo e($content['about_mission_title'] ?? 'Our Mission'); ?></h3>
                        <p class="rg-card__text mb-0"><?php echo e($content['about_mission_text'] ?? 'To provide rapid, reliable, and compassionate emergency medical transport services that save lives and bring comfort to families during their most critical moments. We strive to set the benchmark for pre-hospital care across India.'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="flip-right" data-aos-delay="100">
                <div class="rg-card h-100">
                    <div class="rg-card__body">
                        <div class="rg-card__icon"><i class="bi bi-eye animate-pulse" style="display:inline-block;"></i></div>
                        <h3 class="rg-card__title"><?php echo e($content['about_vision_title'] ?? 'Our Vision'); ?></h3>
                        <p class="rg-card__text mb-0"><?php echo e($content['about_vision_text'] ?? 'To become India\'s most trusted healthcare logistics partner — bridging the gap between emergency scenes and advanced medical care with dignity, speed, and professionalism in every journey we undertake.'); ?></p>
                    </div>
                </div>
            </div>
        </div>



        <div class="row g-3 mb-3">
                <div class="col-md-4 col-6" data-aos="zoom-in">
                    <div class="rg-card text-center h-100">
                        <div class="rg-card__body">
                            <div class="rg-card__icon"><i class="bi bi-clock animate-spin-slow" style="display:inline-block;"></i></div>
                            <h5 class="rg-card__title">24/7 Availability</h5>
                            <p class="rg-card__text mb-0">Round-the-clock emergency response and funeral support, every day of the year.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="50">
                    <div class="rg-card text-center h-100">
                        <div class="rg-card__body">
                            <div class="rg-card__icon"><i class="bi bi-lightning-charge animate-pulse" style="display:inline-block;"></i></div>
                            <h5 class="rg-card__title">Quick Response Time</h5>
                            <p class="rg-card__text mb-0">Rapid dispatch with GPS-tracked fleet ensuring help arrives when every second counts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="rg-card text-center h-100">
                        <div class="rg-card__body">
                            <div class="rg-card__icon"><i class="bi bi-people animate-float" style="display:inline-block;"></i></div>
                            <h5 class="rg-card__title">Experienced &amp; Caring Staff</h5>
                            <p class="rg-card__text mb-0">Trained paramedics, EMTs, and funeral professionals dedicated to compassionate service.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="150">
                    <div class="rg-card text-center h-100">
                        <div class="rg-card__body">
                            <div class="rg-card__icon"><i class="bi bi-truck-front animate-bounce" style="display:inline-block;"></i></div>
                            <h5 class="rg-card__title">Modern Ambulance Fleet</h5>
                            <p class="rg-card__text mb-0">State-of-the-art ICU, ventilator, and oxygen-equipped ambulances for safe transport.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="rg-card text-center h-100">
                        <div class="rg-card__body">
                            <div class="rg-card__icon"><i class="bi bi-cash-coin animate-tada" style="display:inline-block;"></i></div>
                            <h5 class="rg-card__title">Affordable &amp; Transparent Pricing</h5>
                            <p class="rg-card__text mb-0">Clear, upfront pricing with no hidden charges — quality care at fair rates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6" data-aos="zoom-in" data-aos-delay="250">
                    <div class="rg-card text-center h-100">
                        <div class="rg-card__body">
                            <div class="rg-card__icon"><i class="bi bi-shield-check animate-rubber-band" style="display:inline-block;"></i></div>
                            <h5 class="rg-card__title">Trusted by Families &amp; Healthcare Providers</h5>
                            <p class="rg-card__text mb-0">Preferred partner for hospitals, nursing homes, and families across the region.</p>
                        </div>
                    </div>
                </div>
            </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($statistics->count()): ?>
        <div class="rg-stats mb-3" style="border-radius: var(--rg-radius); overflow: hidden; box-shadow: 0 8px 32px rgba(10,22,40,0.08);">
            <div class="rg-stats__grid p-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rg-stats__item animate-float" style="animation-delay:<?php echo e($loop->index * 0.2); ?>s">
                        <div class="stat-value"><span data-counter="<?php echo e(preg_replace('/[^0-9]/', '', $stat->value)); ?>" data-suffix="<?php echo e($stat->suffix ?? ''); ?>">0</span></div>
                        <div class="stat-label"><?php echo e($stat->label); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($timeline->count()): ?>
        <div class="mb-3">
            <div class="text-center mb-3" data-aos="fade-up">
                <span class="section-subtitle justify-content-center animate-wiggle">Our Journey</span>
                <h2 class="section-title">Company Timeline</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="rg-about__timeline">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                                <div class="year"><?php echo e($item->year); ?></div>
                                <h4 class="title"><?php echo e($item->title); ?></h4>
                                <p class="text-muted-premium"><?php echo e($item->description); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certificates->count()): ?>
        <div class="text-center mb-4" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">Certifications</span>
            <h2 class="section-title">Awards & Certificates</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in">
                    <div class="rg-card">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cert->image): ?>
                            <div class="rg-card__image" style="aspect-ratio:1;"><img src="<?php echo e(asset('storage/' . $cert->image)); ?>" alt="<?php echo e($cert->title); ?>"></div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="rg-card__body text-center p-3">
                            <h6 class="mb-0"><?php echo e($cert->title); ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/about.blade.php ENDPATH**/ ?>