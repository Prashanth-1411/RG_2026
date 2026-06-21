@extends('frontend.layouts.master')

@section('content')
@include('frontend.components.page-hero', [
    'title' => $content['faq_title'] ?? 'Frequently Asked Questions',
    'description' => $content['faq_subtitle'] ?? 'Find answers to common questions about our services.',
    'breadcrumb' => 'FAQ',
])

<section class="rg-faq">
    <div class="container-premium">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion" data-aos="fade-up">
                    @forelse($faqs as $faq)
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">{{ $faq->answer }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted-premium">No FAQs available yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
