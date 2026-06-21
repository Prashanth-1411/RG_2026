<div class="rg-card" data-aos="{{ $aos ?? 'fade-up' }}" data-aos-delay="{{ $delay ?? 0 }}">
    @if($service->imageUrl())
        <div class="rg-card__image">
            <img src="{{ $service->imageUrl() }}" alt="{{ $service->title }}" loading="lazy">
            <div class="card-overlay"></div>
        </div>
    @endif
    <div class="rg-card__body">
        @if($service->icon)
            <div class="rg-card__icon animate-float" style="animation-delay:{{ ($delay ?? 0) / 1000 }}s"><i class="bi bi-{{ $service->icon }}"></i></div>
        @endif
        <h3 class="rg-card__title">{{ $service->title }}</h3>
        <p class="rg-card__text">{{ $service->short_description }}</p>
        <a href="{{ route('frontend.services.show', $service->slug) }}" class="rg-card__link">
            Learn More <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
