@extends('frontend.layouts.master')

@section('content')
@include('frontend.components.page-hero', [
    'title' => $content['testimonials_title'] ?? 'Client Testimonials',
    'description' => $content['testimonials_subtitle'] ?? 'Hear from families and patients we have served.',
    'breadcrumb' => 'Testimonials',
])

<section class="rg-testimonials" style="background: var(--rg-bg); color: inherit; padding: 5rem 0;">
    <div class="container-premium">
        <div class="row g-4">
            @forelse($testimonials as $testimonial)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @include('frontend.components.testimonial-card', ['testimonial' => $testimonial])
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted-premium">No testimonials yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('frontend.components.cta-section')
@endsection
