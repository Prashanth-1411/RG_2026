@extends('frontend.layouts.master')

@section('content')
@php $page = \App\Models\Page::where('page_name', 'about')->first(); @endphp

@include('frontend.components.page-hero', [
    'title' => $content['about_title'] ?? $page?->heading ?? 'About Us',
    'description' => $content['about_subtitle'] ?? $page?->subheading ?? '',
    'breadcrumb' => 'About',
    'heroImage' => $page?->hero_image_url,
])

<section class="rg-about" style="padding-top:0;">
    <div class="container-premium">

        <div class="row g-3 mb-3">
            <div class="col-md-6" data-aos="flip-left">
                <div class="rg-card h-100">
                    <div class="rg-card__body">
                        <div class="rg-card__icon"><i class="bi bi-bullseye animate-spin-slow" style="display:inline-block;"></i></div>
                        <h3 class="rg-card__title">{{ $content['about_mission_title'] ?? 'Our Mission' }}</h3>
                        <p class="rg-card__text mb-0">{{ $content['about_mission_text'] ?? 'To provide rapid, reliable, and compassionate emergency medical transport services that save lives and bring comfort to families during their most critical moments. We strive to set the benchmark for pre-hospital care across India.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="flip-right" data-aos-delay="100">
                <div class="rg-card h-100">
                    <div class="rg-card__body">
                        <div class="rg-card__icon"><i class="bi bi-eye animate-pulse" style="display:inline-block;"></i></div>
                        <h3 class="rg-card__title">{{ $content['about_vision_title'] ?? 'Our Vision' }}</h3>
                        <p class="rg-card__text mb-0">{{ $content['about_vision_text'] ?? 'To become India\'s most trusted healthcare logistics partner — bridging the gap between emergency scenes and advanced medical care with dignity, speed, and professionalism in every journey we undertake.' }}</p>
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

        @if($statistics->count())
        <div class="rg-stats mb-3" style="border-radius: var(--rg-radius); overflow: hidden; box-shadow: 0 8px 32px rgba(10,22,40,0.08);">
            <div class="rg-stats__grid p-4">
                @foreach($statistics as $stat)
                    <div class="rg-stats__item animate-float" style="animation-delay:{{ $loop->index * 0.2 }}s">
                        <div class="stat-value"><span data-counter="{{ preg_replace('/[^0-9]/', '', $stat->value) }}" data-suffix="{{ $stat->suffix ?? '' }}">0</span></div>
                        <div class="stat-label">{{ $stat->label }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($timeline->count())
        <div class="mb-3">
            <div class="text-center mb-3" data-aos="fade-up">
                <span class="section-subtitle justify-content-center animate-wiggle">Our Journey</span>
                <h2 class="section-title">Company Timeline</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="rg-about__timeline">
                        @foreach($timeline as $item)
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                <div class="year">{{ $item->year }}</div>
                                <h4 class="title">{{ $item->title }}</h4>
                                <p class="text-muted-premium">{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($certificates->count())
        <div class="text-center mb-4" data-aos="fade-up">
            <span class="section-subtitle justify-content-center animate-wiggle">Certifications</span>
            <h2 class="section-title">Awards & Certificates</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($certificates as $cert)
                <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in">
                    <div class="rg-card">
                        @if($cert->image)
                            <div class="rg-card__image" style="aspect-ratio:1;"><img src="{{ $cert->image_url }}" alt="{{ $cert->title }}"></div>
                        @endif
                        <div class="rg-card__body text-center p-3">
                            <h6 class="mb-0">{{ $cert->title }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection
