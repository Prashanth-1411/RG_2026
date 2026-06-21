<div class="rg-fleet-card" data-aos="fade-up" data-aos-delay="{{ $delay ?? 0 }}">
    <div class="rg-card__image">
        @if($fleet->mainImageUrl())
            <img src="{{ $fleet->mainImageUrl() }}" alt="{{ $fleet->name }}" loading="lazy">
        @else
            <img src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=800&q=80" alt="{{ $fleet->name }}" loading="lazy">
        @endif
        <span class="rg-fleet-card__status {{ $fleet->is_available ? 'available' : 'unavailable' }}">
            {{ $fleet->is_available ? 'Available' : 'Unavailable' }}
        </span>
        <div class="card-overlay"></div>
    </div>
    <div class="rg-card__body">
        <span class="rg-badge mb-3">{{ $fleet->category }}</span>
        <h3 class="rg-card__title">{{ $fleet->name }}</h3>
        <p class="rg-card__text">{{ Str::limit($fleet->description, 120) }}</p>
        @if($fleet->specifications)
            <div class="rg-fleet-card__specs">
                @foreach(array_slice($fleet->specifications, 0, 3) as $key => $value)
                    <span class="spec-tag">{{ is_string($key) ? "$key: $value" : $value }}</span>
                @endforeach
            </div>
        @endif
        <a href="{{ route('frontend.fleet.show', $fleet->slug) }}" class="rg-card__link mt-3">
            View Details <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
