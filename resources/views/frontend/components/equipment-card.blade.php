<div class="rg-equipment-card" data-aos="{{ $aos ?? 'fade-up' }}" data-aos-delay="{{ $delay ?? 0 }}">
    <div class="rg-card__image">
        @if($equipment->imageUrl())
            <img src="{{ $equipment->imageUrl() }}" alt="{{ $equipment->name }}" loading="lazy">
        @endif
        <div class="card-overlay"></div>
    </div>
    <div class="rg-card__body d-flex flex-column">
        <h3 class="rg-card__title">{{ $equipment->name }}</h3>

        <p class="rg-card__text">{{ Str::limit($equipment->description, 100) }}</p>
        @if($equipment->price)
            <div class="rg-equipment-card__price">₹{{ number_format($equipment->price, 0) }}<small class="text-muted-premium fs-6">/day</small></div>
        @endif
    </div>
</div>
