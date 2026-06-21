@extends('frontend.layouts.master')

@section('title', ($service->meta_title ?? $service->title) . ' | ' . ($content['site_name'] ?? $site->company_name ?? ''))
@section('meta_description', $service->meta_description ?? $service->short_description)

@section('content')
@include('frontend.components.page-hero', [
    'title' => $service->title,
    'description' => $service->short_description,
    'breadcrumb' => $service->title,
    'heroImage' => $service->bannerUrl(),
])

<section class="rg-service-detail">
    <div class="container-premium">
        <div class="row g-4">
            <div class="col-lg-8">
                @if($service->bannerUrl())
                    <div class="rg-service-detail__banner" data-aos="fade-up">
                        <img src="{{ $service->bannerUrl() }}" alt="{{ $service->title }}">
                    </div>
                @endif
                <div class="section-desc" data-aos="fade-up">{!! nl2br(e($service->description)) !!}</div>

                @if($service->features->count())
                    <h3 class="section-title mt-3 mb-3" data-aos="fade-up">Key Features</h3>
                    <ul class="rg-service-detail__features" data-aos="fade-up">
                        @foreach($service->features as $feature)
                            <li><i class="bi bi-check-circle-fill"></i> {{ $feature->feature }}</li>
                        @endforeach
                    </ul>
                @endif

                @if($service->getMedia('gallery')->count())
                    <div class="rg-service-detail__gallery" data-aos="fade-up">
                        @foreach($service->getMedia('gallery') as $media)
                            <img src="{{ $media->getUrl() }}" alt="{{ $service->title }}" data-lightbox="{{ $media->getUrl() }}">
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="rg-card sticky-top" style="top: 120px;" data-aos="fade-left">
                    <div class="rg-card__body">
                        <h4 class="rg-card__title">Need This Service?</h4>
                        <p class="rg-card__text">Contact us for immediate assistance or to schedule a service.</p>
                        @if($site?->phone_primary)
                            <a href="tel:{{ $site->phone_primary }}" class="btn-rg btn-rg-primary w-100 mb-3">
                                <i class="bi bi-telephone-fill"></i> Call Now
                            </a>
                        @endif
                        <a href="{{ route('frontend.contact') }}" class="btn-rg btn-rg-ghost w-100">Send Inquiry</a>
                    </div>
                </div>
            </div>
        </div>

        @if($related->count())
            <div class="mt-3 pt-3">
                <h3 class="section-title mb-4" data-aos="fade-up">Related Services</h3>
                <div class="rg-services__grid">
                    @foreach($related as $rel)
                        @include('frontend.components.service-card', ['service' => $rel, 'aos' => 'zoom-in'])
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
