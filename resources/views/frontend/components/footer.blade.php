<footer class="rg-footer">
    <div class="container-premium">
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up">
                <div class="rg-footer__brand">
                    <img src="{{ $site->logo_url }}" alt="{{ $site->company_name }}" class="footer-logo" style="max-width:220px;">
                    <p>{{ $site->footer_description ?? $site->tagline ?? '' }}</p>
                        <div class="rg-footer__social">
                            @if($site?->facebook)<a href="{{ $site->facebook }}" target="_blank" rel="noopener"><i class="bi bi-facebook animate-float" style="display:inline-block;"></i></a>@endif
                            @if($site?->instagram)<a href="{{ $site->instagram }}" target="_blank" rel="noopener"><i class="bi bi-instagram animate-bounce" style="display:inline-block;"></i></a>@endif
                            @if($site?->linkedin)<a href="{{ $site->linkedin }}" target="_blank" rel="noopener"><i class="bi bi-linkedin animate-pulse" style="display:inline-block;"></i></a>@endif
                            @if($site?->youtube)<a href="{{ $site->youtube }}" target="_blank" rel="noopener"><i class="bi bi-youtube animate-shake" style="display:inline-block;"></i></a>@endif
                            @if($site?->twitter)<a href="{{ $site->twitter }}" target="_blank" rel="noopener"><i class="bi bi-twitter-x animate-wiggle" style="display:inline-block;"></i></a>@endif
                        </div>
                </div>
            </div>

            <div class="col-6 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                <h6 class="rg-footer__heading">Quick Links</h6>
                <ul class="rg-footer__links">
                    @forelse($footerNav as $item)
                        <li><a href="{{ url($item->link) }}">{{ $item->label }}</a></li>
                    @empty
                        <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                        <li><a href="{{ route('frontend.services') }}">Services</a></li>
                        <li><a href="{{ route('frontend.fleet') }}">Our Fleet</a></li>
                        <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                    @endforelse
                </ul>
            </div>

            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <h6 class="rg-footer__heading">Our Services</h6>
                <ul class="rg-footer__links">
                    <li><a href="{{ route('frontend.services') }}">Ambulance Services</a></li>
                    <li><a href="{{ route('frontend.fleet') }}">Fleet & Transport</a></li>
                    <li><a href="{{ route('frontend.mortuary') }}">Mortuary Services</a></li>
                    <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <h6 class="rg-footer__heading">Contact Us</h6>
                <div class="rg-footer__contact">
                    @if($site?->address)
                        <div class="contact-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <div>
                                <span>{{ $site->address }}{{ $site->city ? ', ' . $site->city : '' }}{{ $site->pincode ? ' - ' . $site->pincode : '' }}</span>
                            </div>
                        </div>
                    @endif
                    @if($site?->phone_primary)
                        <div class="contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            <div><a href="tel:{{ $site->phone_primary }}">{{ $site->phone_primary }}</a></div>
                        </div>
                    @endif
                    @if($site?->email)
                        <div class="contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <div><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></div>
                        </div>
                    @endif
                    @if($site?->whatsapp)
                        <div class="contact-item">
                            <i class="bi bi-whatsapp"></i>
                            <div><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site->whatsapp) }}" target="_blank">{{ $site->whatsapp }}</a></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="rg-footer__bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <span>{{ $site->footer_text ?? '© ' . date('Y') . ' ' . ($site->company_name ?? 'R.G. Ambulance Service') . '. All rights reserved.' }}</span>
                <span>Designed by <a href="https://prashanthwebtech.com" target="_blank" rel="noopener">Prashanth Web Tech</a></span>
            </div>
        </div>
    </div>
</footer>
