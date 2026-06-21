@php
    $name = $item->name ?? $item->title ?? '';
    $image = method_exists($item, 'mainImageUrl') ? $item->mainImageUrl() : (method_exists($item, 'imageUrl') ? $item->imageUrl() : null);
    $price = $item->price ?? null;
    $isAvailable = $item->is_available ?? null;
    $features = $item->features ?? null;
@endphp

<div class="rg-fleet-card" data-aos="{{ $aos ?? 'fade-up' }}" data-aos-delay="{{ $delay ?? 0 }}">
    <div class="rg-card__image">
        @if($image)
            <img src="{{ $image }}" alt="{{ $name }}" loading="lazy">
            <div class="card-overlay"></div>
        @else
            <div class="rg-card__image-placeholder">
                <i class="bi bi-image text-muted"></i>
            </div>
        @endif
        @if($isAvailable !== null)
            <div class="rg-fleet-card__status {{ $isAvailable ? 'available' : 'unavailable' }}">
                {{ $isAvailable ? 'Available' : 'On Request' }}
            </div>
        @endif
    </div>
    <div class="rg-card__body d-flex flex-column">
        <h3 class="rg-card__title rg-card__title--sm">{{ $name }}</h3>
        @if($price)
            <div class="rg-equipment-card__price mb-2">₹{{ number_format($price, 0) }}<small class="rg-card__price-unit">/day</small></div>
        @endif
        <p class="rg-card__text flex-grow-1">{{ Str::limit($item->description ?? '', 120) }}</p>
        @if($features)
            <div class="rg-fleet-card__specs">
                @php
                    $featureList = is_string($features) ? explode("\n", $features) : (is_array($features) ? $features : []);
                @endphp
                @foreach(array_slice($featureList, 0, 4) as $feature)
                    @if(trim($feature))
                        <span class="spec-tag">{{ trim($feature) }}</span>
                    @endif
                @endforeach
            </div>
        @endif
        <a href="tel:{{ $site->phone_primary ?? '' }}" class="rg-card__link mt-3">
            <i class="bi bi-telephone-fill"></i> Enquire Now
        </a>
    </div>
</div>
