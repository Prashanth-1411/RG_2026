@extends('frontend.layouts.master')

@section('content')
@php $page = \App\Models\Page::where('page_name', 'contact')->first(); @endphp

@include('frontend.components.page-hero', [
    'title' => $content['contact_title'] ?? $page?->heading ?? 'Contact Us',
    'description' => $content['contact_subtitle'] ?? $page?->subheading ?? '',
    'breadcrumb' => 'Contact',
])

<section class="rg-contact">
    <div class="container-premium">
        @if(session('success'))
            <div class="alert-rg alert-rg-success mb-4" data-aos="fade-up">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="rg-contact__info">
                    <h3 class="mb-4" style="font-family: var(--rg-heading-font); color:#fff;">Get In Touch</h3>
                    @if($content['contact_address'] ?? $site?->address)
                        <div class="info-item">
                            <div class="icon-wrap animate-float"><i class="bi bi-geo-alt-fill"></i></div>
                            <div>
                                <h6>Address</h6>
                                <p>{{ $content['contact_address'] ?? $site->address }}{{ $site?->city ? ', ' . $site->city : '' }}{{ $site?->pincode ? ' - ' . $site->pincode : '' }}</p>
                            </div>
                        </div>
                    @endif
                    @if($content['contact_phone'] ?? $site?->phone_primary)
                        <div class="info-item">
                            <div class="icon-wrap animate-shake" style="display:inline-flex;"><i class="bi bi-telephone-fill"></i></div>
                            <div>
                                <h6>Phone</h6>
                                <p><a href="tel:{{ $content['contact_phone'] ?? $site->phone_primary }}">{{ $content['contact_phone'] ?? $site->phone_primary }}</a></p>
                            </div>
                        </div>
                    @endif
                    @if($content['contact_email'] ?? $site?->email)
                        <div class="info-item">
                            <div class="icon-wrap animate-bounce" style="display:inline-flex;"><i class="bi bi-envelope-fill"></i></div>
                            <div>
                                <h6>Email</h6>
                                <p><a href="mailto:{{ $content['contact_email'] ?? $site->email }}">{{ $content['contact_email'] ?? $site->email }}</a></p>
                            </div>
                        </div>
                    @endif
                    @if($content['contact_whatsapp'] ?? $site?->whatsapp)
                        <div class="info-item">
                            <div class="icon-wrap animate-pulse" style="display:inline-flex;"><i class="bi bi-whatsapp"></i></div>
                            <div>
                                <h6>WhatsApp</h6>
                                <p><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $content['contact_whatsapp'] ?? $site->whatsapp) }}" target="_blank">{{ $content['contact_whatsapp'] ?? $site->whatsapp }}</a></p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="rg-contact__form-wrap">
                    <h3 class="section-title mb-4" style="font-size:1.75rem;">Send a Message</h3>
                    <form action="{{ route('frontend.contact.store') }}" method="POST" class="rg-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="50">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
                                @error('subject')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-12" data-aos="fade-up" data-aos-delay="250">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
                                @error('message')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                                <button type="submit" class="btn-rg btn-rg-primary">Send Message <i class="bi bi-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="rg-contact__map mt-3" data-aos="fade-up">
            <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d7770.485630975194!2d80.186466!3d13.147078!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDA4JzQ5LjUiTiA4MMKwMTEnMjAuNiJF!5e0!3m2!1sen!2sin!4v1781897966637!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection
