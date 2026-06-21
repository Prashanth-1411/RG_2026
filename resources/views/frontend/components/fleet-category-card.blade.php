<div class="rg-fleet-card" data-aos="{{ $aos ?? 'fade-up' }}" data-aos-delay="{{ $delay ?? 0 }}">
    <div class="rg-card__image">
        @if($category->imageUrl())
            <img src="{{ $category->imageUrl() }}" alt="{{ $category->name }}" loading="lazy">
        @endif
        <div class="card-overlay"></div>
    </div>
    <div class="rg-card__body">
        @if($category->subtitle)
            <span class="rg-badge mb-3">{{ $category->subtitle }}</span>
        @endif
        <h3 class="rg-card__title">{{ $category->name }}</h3>
        <p class="rg-card__text">{{ Str::limit($category->description, 160) }}</p>
        <a href="{{ route('frontend.fleet.show', $category->slug) }}" class="rg-card__link mt-3">
            View Details <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
