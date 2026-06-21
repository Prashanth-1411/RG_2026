<section class="rg-cta" id="booking-form">
    <div class="container-premium">
        <div class="rg-cta__inner" data-gsap="fade-up">
            <h2 class="rg-cta__title"><?php echo e($title ?? $content['cta_title'] ?? 'Need Emergency Assistance?'); ?></h2>
            <p class="rg-cta__desc"><?php echo e($description ?? $content['cta_description'] ?? 'Our team is available 24/7 to provide immediate medical transport and emergency response.'); ?></p>

            <div class="rg-cta__actions mb-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->phone_primary): ?>
                    <a href="tel:<?php echo e($site->phone_primary); ?>" class="btn-rg btn-rg-primary btn-lg">
                        <i class="bi bi-telephone-fill"></i> <?php echo e($site->phone_primary); ?>

                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site?->whatsapp): ?>
                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $site->whatsapp)); ?>" target="_blank" class="btn-rg" style="background:#25D366;color:#fff;border-color:#25D366;">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <form method="POST" action="<?php echo e(route('frontend.contact.store')); ?>" class="row g-3 mt-3 text-start mx-auto" style="max-width:600px;">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="subject" value="Emergency Booking Enquiry">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control form-control-lg bg-white bg-opacity-90 border-0" placeholder="Your Name" required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control form-control-lg bg-white bg-opacity-90 border-0" placeholder="Your Email" required>
                </div>
                <div class="col-md-6">
                    <input type="tel" name="phone" class="form-control form-control-lg bg-white bg-opacity-90 border-0" placeholder="Phone Number" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="address" class="form-control form-control-lg bg-white bg-opacity-90 border-0" placeholder="Pickup Location">
                </div>
                <div class="col-12">
                    <textarea name="message" class="form-control form-control-lg bg-white bg-opacity-90 border-0" rows="2" placeholder="Tell us your requirement..." required></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn-rg" style="background:#fff;color:#0A1628;border-color:#fff;font-weight:700;">
                        <i class="bi bi-send-fill"></i> Send Booking Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\R.G.-Ambulance-master\resources\views/frontend/components/cta-section.blade.php ENDPATH**/ ?>