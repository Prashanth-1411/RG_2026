@extends('frontend.layouts.master')

@section('content')
@include('frontend.components.page-hero', [
    'title' => $category->name,
    'description' => $category->description,
    'breadcrumb' => $category->name,
    'heroImage' => $category->imageUrl(),
])

<section class="rg-fleet bg-premium-light">
    <div class="container-premium">
        @if($category->subtitle)
            <div class="text-center mb-3" data-aos="fade-up">
                <span class="section-subtitle justify-content-center">{{ $category->subtitle }}</span>
            </div>
        @endif

        <div class="rg-fleet__grid">
            @forelse($items as $item)
                @include('frontend.components.fleet-item-card', ['item' => $item, 'delay' => $loop->index * 100, 'aos' => 'zoom-in-up'])
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted-premium">No items available in this category.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-3" data-aos="fade-up">
            <a href="{{ route('frontend.fleet') }}" class="btn-rg btn-rg-ghost">
                <i class="bi bi-arrow-left"></i> Back to Fleet
            </a>
            @if($site?->phone_primary)
                <a href="tel:{{ $site->phone_primary }}" class="btn-rg btn-rg-primary ms-3">
                    <i class="bi bi-telephone-fill"></i> Enquire Now
                </a>
            @endif
        </div>
    </div>
</section>

@include('frontend.components.cta-section')
@endsection
