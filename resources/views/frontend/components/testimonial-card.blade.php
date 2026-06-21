<div class="rg-testimonial-card" data-aos="{{ $aos ?? 'fade-up' }}" data-aos-delay="{{ $delay ?? 0 }}">
    <div class="rg-testimonial-card__stars">
        @for($i = 1; $i <= ($testimonial->rating ?? 5); $i++)
            <i class="bi bi-star-fill"></i>
        @endfor
    </div>
    <p class="rg-testimonial-card__text">"{{ $testimonial->content }}"</p>
    <div class="rg-testimonial-card__author">
        @if($testimonial->image)
            <img src="{{ str_starts_with($testimonial->image, 'http') ? $testimonial->image : asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
        @else
            <div class="rg-card__avatar">
                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
            </div>
        @endif
        <div>
            <div class="author-name">{{ $testimonial->name }}</div>
            <div class="author-role">{{ $testimonial->designation ?? $testimonial->position ?? '' }}</div>
        </div>
    </div>
</div>
