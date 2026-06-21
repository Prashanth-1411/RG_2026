@extends('frontend.layouts.master')

@section('content')
@include('frontend.components.page-hero', [
    'title' => $fleet->name,
    'description' => $fleet->category,
    'breadcrumb' => $fleet->name,
    'heroImage' => $fleet->mainImageUrl(),
])

<section class="rg-service-detail">
    <div class="container-premium">
        <div class="row g-4">
            <div class="col-lg-7">
                @if($fleet->mainImageUrl())
                    <div class="rg-service-detail__banner mb-4" data-aos="fade-up">
                        <img src="{{ $fleet->mainImageUrl() }}" alt="{{ $fleet->name }}">
                    </div>
                @endif
                <div class="section-desc" data-aos="fade-up">{!! nl2br(e($fleet->description)) !!}</div>

                @if($fleet->specifications)
                    <h3 class="section-title mt-3 mb-3" data-aos="fade-up">Specifications</h3>
                    <div class="row g-3">
                        @foreach($fleet->specifications as $key => $value)
                            <div class="col-md-6" data-aos="flip-up" data-aos-delay="{{ $loop->index * 50 }}">
                                <div class="rg-card">
                                    <div class="rg-card__body py-3">
                                        <small class="text-muted-premium text-uppercase" style="font-size:0.7rem;letter-spacing:0.1em;">{{ is_string($key) ? $key : 'Spec' }}</small>
                                        <div class="fw-semibold">{{ is_string($key) ? $value : $value }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(count($fleet->galleryUrls()))
                    <div class="rg-service-detail__gallery mt-3" data-aos="fade-up">
                        @foreach($fleet->galleryUrls() as $url)
                            <img src="{{ $url }}" alt="{{ $fleet->name }}" data-lightbox="{{ $url }}">
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-lg-5">
                <div class="rg-card sticky-top" style="top:120px;" data-aos="fade-left">
                    <div class="rg-card__body">
                        <span class="rg-fleet-card__status {{ $fleet->is_available ? 'available' : 'unavailable' }} d-inline-block mb-3">
                            {{ $fleet->is_available ? 'Available' : 'Currently Unavailable' }}
                        </span>
                        <h4 class="rg-card__title">{{ $fleet->name }}</h4>
                        <p class="rg-card__text">{{ $fleet->category }}</p>
                        @if($site?->phone_primary)
                            <a href="tel:{{ $site->phone_primary }}" class="btn-rg btn-rg-primary w-100 mb-3">
                                <i class="bi bi-telephone-fill"></i> Book This Vehicle
                            </a>
                        @endif
                        <a href="{{ route('frontend.contact') }}" class="btn-rg btn-rg-ghost w-100">Request Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
