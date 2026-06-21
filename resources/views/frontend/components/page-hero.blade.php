<section class="rg-page-hero">
    @if(isset($heroImage) && $heroImage)
        <div class="rg-page-hero__bg"><img src="{{ $heroImage }}" alt=""></div>
    @endif
    <div class="rg-page-hero__overlay"></div>
    <div class="container-premium">
        <div class="rg-page-hero__content" data-aos="fade-up">
            @if(isset($breadcrumb))
                <nav class="rg-page-hero__breadcrumb">
                    <a href="{{ route('frontend.home') }}">Home</a>
                    <span>/</span>
                    <span class="active">{{ $breadcrumb }}</span>
                </nav>
            @endif
            <h1 class="rg-page-hero__title">{{ $title }}</h1>
            @if(isset($description) && $description)
                <p class="rg-page-hero__desc">{{ $description }}</p>
            @endif
        </div>
    </div>
</section>
