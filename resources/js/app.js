import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import AOS from 'aos';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
    const animationsEnabled = getComputedStyle(document.documentElement)
        .getPropertyValue('--rg-animations').trim() !== '0';

    if (animationsEnabled) {
        AOS.init({
            duration: 800,
            once: false,
            mirror: true,
            offset: 80,
            easing: 'ease-out-cubic',
            disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
        });
    }

    initLoader();
    initHeader();
    initMobileNav();
    initHeroSwiper();
    initTestimonialSwiper();
    initCounters();
    initGsapAnimations(animationsEnabled);
    initGalleryLightbox();
});

function initLoader() {
    const loader = document.getElementById('page-loader');
    if (!loader) return;
    const hide = () => loader.classList.add('hidden');
    window.addEventListener('load', () => setTimeout(hide, 400));
    setTimeout(hide, 3000);
}

function initHeader() {
    const header = document.querySelector('.rg-header');
    if (!header) return;
    const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 60);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

function initMobileNav() {
    const toggle = document.querySelector('[data-mobile-toggle]');
    const nav = document.querySelector('.rg-mobile-nav');
    const close = document.querySelector('[data-mobile-close]');
    if (!toggle || !nav) return;

    const open = () => {
        nav.classList.add('open');
        document.body.style.overflow = 'hidden';
    };
    const shut = () => {
        nav.classList.remove('open');
        document.body.style.overflow = '';
    };

    toggle.addEventListener('click', open);
    close?.addEventListener('click', shut);
    nav.querySelectorAll('a').forEach(a => a.addEventListener('click', shut));
}

function initHeroSwiper() {
    const el = document.querySelector('.hero-swiper');
    if (!el) return;

    new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay, EffectFade],
        effect: 'fade',
        fadeEffect: { crossFade: true },
        loop: true,
        speed: 1200,
        autoplay: { delay: 6000, disableOnInteraction: false },
        navigation: {
            nextEl: '.hero-next',
            prevEl: '.hero-prev',
        },
        pagination: {
            el: '.hero-pagination',
            clickable: true,
        },
    });
}

function initTestimonialSwiper() {
    const el = document.querySelector('.testimonial-swiper');
    if (!el) return;

    new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: { delay: 5000 },
        breakpoints: {
            768: { slidesPerView: 2 },
            1200: { slidesPerView: 3 },
        },
        navigation: {
            nextEl: '.testimonial-next',
            prevEl: '.testimonial-prev',
        },
    });
}

function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    if (!counters.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const target = parseInt(el.dataset.counter, 10);
            const suffix = el.dataset.suffix || '';
            el.textContent = '0';
            let current = 0;
            const step = Math.max(1, Math.ceil(target / 60));

            const tick = () => {
                current += step;
                if (current >= target) {
                    el.textContent = target.toLocaleString() + suffix;
                    return;
                }
                el.textContent = current.toLocaleString() + suffix;
                requestAnimationFrame(tick);
            };
            tick();
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
}

function initGsapAnimations(enabled) {
    if (!enabled || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    gsap.utils.toArray('[data-gsap="fade-up"]').forEach(el => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'restart none none reset' },
            y: 60,
            opacity: 0,
            duration: 1,
            ease: 'power3.out',
        });
    });

    gsap.utils.toArray('[data-gsap="fade-left"]').forEach(el => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'restart none none reset' },
            x: -60,
            opacity: 0,
            duration: 1,
            ease: 'power3.out',
        });
    });

    gsap.utils.toArray('[data-gsap="fade-right"]').forEach(el => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: 'top 85%', toggleActions: 'restart none none reset' },
            x: 60,
            opacity: 0,
            duration: 1,
            ease: 'power3.out',
        });
    });

    const heroTitle = document.querySelector('.rg-hero__title');
    if (heroTitle) {
        gsap.from('.rg-hero__badge, .rg-hero__title, .rg-hero__subtitle, .rg-hero__actions', {
            y: 40,
            opacity: 0,
            duration: 1,
            stagger: 0.15,
            ease: 'power3.out',
            delay: 0.3,
        });
    }
}

function initGalleryLightbox() {
    const items = document.querySelectorAll('[data-lightbox]');
    if (!items.length) return;

    let overlay = null;

    items.forEach(item => {
        item.addEventListener('click', () => {
            const src = item.dataset.lightbox || item.querySelector('img')?.src;
            if (!src) return;

            overlay = document.createElement('div');
            overlay.style.cssText = 'position:fixed;inset:0;z-index:99999;background:rgba(10,22,40,0.95);display:flex;align-items:center;justify-content:center;cursor:pointer;padding:2rem;';
            overlay.innerHTML = `<img src="${src}" style="max-width:90%;max-height:90%;object-fit:contain;border-radius:8px;">`;
            overlay.addEventListener('click', () => overlay.remove());
            document.body.appendChild(overlay);
        });
    });
}
