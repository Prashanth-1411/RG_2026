@extends('frontend.layouts.master')

@section('content')
@include('frontend.components.page-hero', [
    'title' => $content['mortuary_title'] ?? 'Mortuary Services',
    'description' => $content['mortuary_subtitle'] ?? 'Compassionate and dignified mortuary facilities.',
    'breadcrumb' => 'Mortuary',
])

<section class="rg-mortuary">
    <div class="container-premium">
        <div class="row g-4">
            @forelse($mortuaries as $mortuary)
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="rg-card h-100">
                        @if($mortuary->getFirstMediaUrl('image'))
                            <div class="rg-card__image">
                                <img src="{{ $mortuary->getFirstMediaUrl('image') }}" alt="{{ $mortuary->title }}" loading="lazy">
                            </div>
                        @endif
                        <div class="rg-card__body">
                            <h3 class="rg-card__title">{{ $mortuary->title }}</h3>
                            <p class="rg-card__text">{{ Str::limit($mortuary->description, 150) }}</p>
                            @if($mortuary->features)
                                <ul class="list-unstyled mt-3">
                                    @foreach($mortuary->features as $feature)
                                        <li class="mb-2"><i class="bi bi-check2 text-accent me-2"></i>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted-premium">No mortuary services listed.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('frontend.components.cta-section')
@endsection
