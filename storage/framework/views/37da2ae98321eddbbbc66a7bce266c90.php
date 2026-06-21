<?php $__env->startSection('content'); ?>

<section class="rg-hero">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($theme['hero_video'] ?? false): ?>
        <div class="rg-hero__bg">
            <video autoplay muted loop playsinline>
                <source src="<?php echo e($theme['hero_video']); ?>" type="video/mp4">
            </video>
        </div>
    <?php elseif($theme['hero_background'] ?? false): ?>
        <div class="rg-hero__bg">
            <img src="<?php echo e($theme['hero_background']); ?>" alt="">
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="swiper hero-swiper rg-hero__swiper">
        <div class="swiper-wrapper">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="swiper-slide">
                    <div class="rg-hero__bg">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slide->image): ?>
                            <img src="<?php echo e(str_starts_with($slide->image, 'http') ? $slide->image : asset('storage/' . $slide->image)); ?>" alt="<?php echo e($slide->title); ?>">
                        <?php elseif($slide->video): ?>
                            <video autoplay muted loop playsinline><source src="<?php echo e($slide->video); ?>" type="video/mp4"></video>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="swiper-slide">
                    <div class="rg-hero__bg">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1920&q=80" alt="Emergency Medical Services">
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <div class="container-premium">
        <div class="rg-hero__content">
            <?php $activeSlide = $heroSlides->first(); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeSlide?->badge_text): ?>
                <div class="rg-hero__badge animate-tada"><i class="bi bi-shield-check"></i> <?php echo e($activeSlide->badge_text); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <h1 class="rg-hero__title"><?php echo e($content['hero_title'] ?? $activeSlide?->title ?? 'Premium Emergency Medical Transport'); ?></h1>
            <p class="rg-hero__subtitle"><?php echo e($content['hero_subtitle'] ?? $activeSlide?->subtitle ?? ''); ?></p>
            <div class="rg-hero__actions">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->phone_primary): ?>
                    <a href="tel:<?php echo e($site->phone_primary); ?>" class="btn-rg btn-rg-primary">
                        <i class="bi bi-telephone-fill animate-shake" style="display:inline-block;"></i> Call Now
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <a href="<?php echo e(route('frontend.contact')); ?>#booking-form" class="btn-rg btn-rg-outline">
                    <i class="bi bi-calendar-check"></i> Book Ambulance
                </a>
                <a href="<?php echo e(url($content['hero_cta_link'] ?? $activeSlide?->button_link ?? '/services')); ?>" class="btn-rg btn-rg-outline">
                    <?php echo e($content['hero_cta_text'] ?? $activeSlide?->button_text ?? 'Our Services'); ?> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="rg-hero__nav d-none d-md-flex">
        <button class="hero-prev" aria-label="Previous"><i class="bi bi-arrow-left"></i></button>
        <button class="hero-next" aria-label="Next"><i class="bi bi-arrow-right"></i></button>
    </div>

    <div class="rg-hero__scroll d-none d-lg-block">
        Scroll
        <i class="bi bi-chevron-down animate-bounce"></i>
    </div>
</section>



<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($statistics->count()): ?>
<div class="container-premium">
    <div class="rg-stats mb-3">
        <div class="rg-stats__grid p-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rg-stats__item animate-float" style="animation-delay:<?php echo e($loop->index * 0.2); ?>s">
                    <div class="stat-value"><span data-counter="<?php echo e(preg_replace('/[^0-9]/', '', $stat->value)); ?>" data-suffix="<?php echo e($stat->suffix ?? ''); ?>">0</span></div>
                    <div class="stat-label"><?php echo e($stat->label); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ambulanceServices->count()): ?>
<section class="rg-services">
    <div class="container-premium">
        <div class="rg-services__header text-center mx-auto" style="max-width:700px;" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">Pan India</span>
            <h2 class="section-title">Pan India Medical Transport Services</h2>
            <p class="section-desc mx-auto">Comprehensive emergency and non-emergency medical transport across all major cities and regions in India.</p>
        </div>
        <div class="row g-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ambulanceServices->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <?php echo $__env->make('frontend.components.service-card', ['service' => $service, 'delay' => $loop->index * 100, 'aos' => 'zoom-in'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div class="text-center mt-3" data-aos="fade-up">
                <a href="<?php echo e(route('frontend.services')); ?>" class="btn-rg btn-rg-ghost">View All Services <i class="bi bi-arrow-right animate-slide-right" style="display:inline-block;"></i></a>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($features->count()): ?>
<section class="rg-services bg-premium-white">
    <div class="container-premium">
        <div class="text-center mx-auto mb-4" style="max-width:700px;" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">Why Choose Us</span>
            <h2 class="section-title"><?php echo e($content['features_title'] ?? 'Trusted Emergency Medical Partner'); ?></h2>
            <p class="section-desc mx-auto"><?php echo e($content['features_subtitle'] ?? 'We combine advanced technology, skilled professionals, and unwavering commitment to deliver the highest standard of care.'); ?></p>
        </div>
        <div class="row g-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4" data-aos="flip-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                    <div class="rg-card h-100">
                        <div class="rg-card__body text-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($feature->icon): ?><div class="rg-card__icon mx-auto animate-rubber-band" style="animation-delay:<?php echo e($loop->index * 0.3); ?>s"><i class="bi bi-<?php echo e($feature->icon); ?>"></i></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <h3 class="rg-card__title"><?php echo e($feature->title); ?></h3>
                            <p class="rg-card__text mb-0"><?php echo e($feature->description); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fleets->count()): ?>
<section class="rg-fleet bg-premium-light">
    <div class="container-premium">
            <div class="text-center mb-3" data-aos="fade-up">
                <span class="section-subtitle justify-content-center animate-wiggle">Our Fleet</span>
                <h2 class="section-title"><?php echo e($content['fleet_title'] ?? 'Premium Medical Vehicles'); ?></h2>
            </div>
            <div class="rg-fleet__grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fleets->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('frontend.components.fleet-category-card', ['category' => $category, 'delay' => $loop->index * 100, 'aos' => 'fade-up-right'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="text-center mt-3">
            <a href="<?php echo e(route('frontend.fleet')); ?>" class="btn-rg btn-rg-dark">View Full Fleet <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>




<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mortuaries->count()): ?>
<section class="rg-mortuary bg-premium-white">
    <div class="container-premium">
            <div class="text-center mb-3" data-aos="fade-up">
                <span class="section-subtitle justify-content-center animate-wiggle">Mortuary Services</span>
                <h2 class="section-title"><?php echo e($content['mortuary_title'] ?? 'Dignified & Professional Care'); ?></h2>
                <p class="section-desc mx-auto"><?php echo e($content['mortuary_subtitle'] ?? 'Comprehensive mortuary services with the utmost respect and professionalism'); ?></p>
            </div>
            <div class="rg-equipment__grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $mortuaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mortuary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rg-equipment-card" data-aos="zoom-in-up" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                        <div class="rg-card__image">
                            <img src="<?php echo e($mortuary->imageUrl()); ?>" alt="<?php echo e($mortuary->title); ?>" loading="lazy">
                            <div class="card-overlay"></div>
                        </div>
                        <div class="rg-card__body d-flex flex-column">
                            <h3 class="rg-card__title"><?php echo e($mortuary->title); ?></h3>
                            <p class="rg-card__text"><?php echo e(Str::limit($mortuary->description, 100)); ?></p>
                            <a href="<?php echo e(route('frontend.mortuary')); ?>" class="rg-card__link mt-3">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="text-center mt-3" data-aos="fade-up">
                <a href="<?php echo e(route('frontend.mortuary')); ?>" class="btn-rg btn-rg-dark">View All Services <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testimonials->count()): ?>
<section class="rg-testimonials">
    <div class="container-premium">
        <div class="text-center mb-4" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">Testimonials</span>
            <h2 class="section-title"><?php echo e($content['testimonials_title'] ?? 'What Our Clients Say'); ?></h2>
        </div>
        <div class="swiper testimonial-swiper rg-testimonials__swiper">
            <div class="swiper-wrapper">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <?php echo $__env->make('frontend.components.testimonial-card', ['testimonial' => $testimonial, 'aos' => 'zoom-in-up'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-3 mt-3">
            <button class="testimonial-prev btn-rg btn-rg-outline" style="width:48px;height:48px;padding:0;"><i class="bi bi-arrow-left"></i></button>
            <button class="testimonial-next btn-rg btn-rg-outline" style="width:48px;height:48px;padding:0;"><i class="bi bi-arrow-right"></i></button>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faqs->count()): ?>
<section class="rg-faq bg-premium-light">
    <div class="container-premium">
        <div class="text-center mb-3" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">FAQ</span>
            <h2 class="section-title"><?php echo e($content['faq_title'] ?? 'Frequently Asked Questions'); ?></h2>
            <p class="section-desc mx-auto"><?php echo e($content['faq_subtitle'] ?? 'Find answers to common questions about our services'); ?></p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="<?php echo e($loop->index * 50); ?>">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?php echo e($loop->first ? '' : 'collapsed'); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo e($faq->id); ?>" aria-expanded="<?php echo e($loop->first ? 'true' : 'false'); ?>">
                                    <?php echo e($faq->question); ?>

                                </button>
                            </h2>
                            <div id="faq<?php echo e($faq->id); ?>" class="accordion-collapse collapse <?php echo e($loop->first ? 'show' : ''); ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body"><?php echo e($faq->answer); ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="text-center mt-3" data-aos="fade-up">
                    <a href="<?php echo e(route('frontend.faq')); ?>" class="btn-rg btn-rg-ghost">View All FAQs <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>




<section class="rg-about bg-premium-white">
    <div class="container-premium">
        <div class="text-center mb-3" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">Coverage Area</span>
            <h2 class="section-title">Our Service Coverage Area</h2>
            <p class="section-desc mx-auto">We provide active ambulance dispatch and funeral care solutions across India. Select your Chennai locality for nearby response times.</p>
        </div>
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <div class="position-relative mb-3 mx-auto" style="max-width:500px;">
                    <input type="text" id="locationSearch" class="form-control" placeholder="Search your location..." style="padding-left:40px;border-radius:50px;height:48px;">
                    <i class="bi bi-search position-absolute animate-spin-slow" style="left:16px;top:50%;transform:translateY(-50%);color:#888;font-size:1.1rem;"></i>
                </div>
                    <div class="row g-2" id="locationList">
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Adyar</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Anna Nagar</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Avadi</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> George Town</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Guindy</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Kilpauk</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> OMR</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Perambur</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Porur</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Royapuram</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> T Nagar</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Tambaram</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Tondiarpet</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Velachery</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Vyasarpadi</div>
                        <div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> Washermanpet</div>
                    </div>
                <div class="text-center mt-3">
                    <a href="#" id="showAllLocations" class="btn-rg btn-rg-ghost">Show All 100+ Chennai Locations <i class="bi bi-arrow-down"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
(function() {
    const allLocations = [
        'Adyar', 'Agaram', 'Alwarthirunagar', 'Ambattur', 'Aminjikarai',
        'Anna Nagar', 'Arumbakkam', 'Ashok Nagar', 'Avadi', 'Broadway',
        'Chennai Central', 'Chetpet', 'Egmore', 'Ennore', 'Ernavur',
        'George Town', 'Guindy', 'Jafferkhanpet', 'Jawahar Nagar',
        'Kathivakkam', 'Kellys', 'Kilpauk', 'KK Nagar', 'Kodungaiyur',
        'Kolathur', 'Korukkupet', 'Madhavaram', 'Manali', 'Minjur',
        'MKB Nagar', 'Mogappair', 'Mylapore', 'Nungambakkam', 'OMR',
        'Parry\'s Corner', 'Pattabiram', 'Perambur', 'Perambur Barracks',
        'Porur', 'Purasawalkam', 'Puzhal', 'Red Hills', 'Royapuram',
        'Saidapet', 'Saligramam', 'Sholavaram', 'Sowcarpet', 'T Nagar',
        'Tambaram', 'Thirumullaivoyal', 'Thiruvika Nagar', 'Thiruvottiyur',
        'Thiruvottiyur (East)', 'Thousand Lights', 'Tondiarpet',
        'Triplicane', 'Vadapalani', 'Valasaravakkam', 'Vallalar Nagar',
        'Velachery', 'Vepery', 'Villivakkam', 'Virugambakkam',
        'Vyasarpadi', 'Washermanpet', 'West Mambalam'
    ];

    const $list = document.getElementById('locationList');
    const $search = document.getElementById('locationSearch');
    const $showBtn = document.getElementById('showAllLocations');
    let showingAll = false;

    function render(filter) {
        const q = (filter || '').toLowerCase();
        const items = allLocations.filter(l => l.toLowerCase().includes(q));
        $list.innerHTML = items.map(l =>
            `<div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> ${l}</div>`
        ).join('');
    }

    $search?.addEventListener('input', function() {
        render(this.value);
    });

    $showBtn?.addEventListener('click', function(e) {
        e.preventDefault();
        showingAll = !showingAll;
        if (showingAll) {
            render('');
            this.innerHTML = 'Show Less <i class="bi bi-arrow-up"></i>';
        } else {
            render('');
            $search.value = '';
            const initial = [
                'Adyar', 'Anna Nagar', 'Avadi', 'George Town', 'Guindy',
                'Kilpauk', 'OMR', 'Perambur', 'Porur', 'Royapuram',
                'T Nagar', 'Tambaram', 'Tondiarpet', 'Velachery',
                'Vyasarpadi', 'Washermanpet'
            ];
            $list.innerHTML = initial.map(l =>
                `<div class="col-6 col-md-3 location-item"><i class="bi bi-geo-alt-fill text-accent me-1"></i> ${l}</div>`
            ).join('');
            this.innerHTML = 'Show All 100+ Chennai Locations <i class="bi bi-arrow-down"></i>';
        }
    });
})();
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/home.blade.php ENDPATH**/ ?>