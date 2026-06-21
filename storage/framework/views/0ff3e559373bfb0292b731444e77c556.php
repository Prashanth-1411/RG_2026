<?php $__env->startSection('content'); ?>
<?php $page = \App\Models\Page::where('page_name', 'services')->first(); ?>

<?php echo $__env->make('frontend.components.page-hero', [
    'title' => $content['services_title'] ?? $page?->heading ?? 'Our Services',
    'description' => $content['services_subtitle'] ?? $page?->subheading ?? 'Comprehensive emergency medical transport services across India with dedicated North Chennai coverage.',
    'breadcrumb' => 'Services',
    'heroImage' => $page?->hero_image ? asset('storage/' . $page->hero_image) : null,
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="rg-services">
    <div class="container-premium">
        <div class="rg-services__header text-center mx-auto" style="max-width:700px;" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">Pan India</span>
            <h2 class="section-title">Pan India Medical Transport Services</h2>
            <p class="section-desc mx-auto">Comprehensive emergency and non-emergency medical transport across all major cities and regions in India.</p>
        </div>
        <div class="rg-services__grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php echo $__env->make('frontend.components.service-card', ['service' => $service, 'delay' => $loop->index * 100, 'aos' => 'zoom-in-up'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted-premium">No services available at the moment.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        
        <section class="rg-about bg-premium-white mt-4">
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
    </div>
</section>

<?php echo $__env->make('frontend.components.cta-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/services/index.blade.php ENDPATH**/ ?>