<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        $theme = [
            'primary_color' => '#0A1628',
            'secondary_color' => '#1A365D',
            'accent_color' => '#C9A227',
            'bg_color' => '#FAFAF8',
            'text_color' => '#2D3748',
            'heading_color' => '#0A1628',
            'body_font' => 'Outfit',
            'heading_font' => 'Cormorant Garamond',
            'body_font_size' => '16',
            'heading_font_size' => '48',
            'button_height' => '52',
            'button_radius' => '4',
            'enable_animations' => '1',
            'enable_glassmorphism' => '1',
            'animation_speed' => 'normal',
            'container_width' => '1320',
            'card_style' => 'elevated',
            'button_style' => 'solid',
        ];

        foreach ($theme as $key => $value) {
            Configuration::setValue($key, $value, 'theme');
        }

        $content = [
            'site_name' => 'R.G. Ambulance Service',
            'site_tagline' => 'Premium Emergency Medical Transport',
            'site_description' => 'Leading provider of 24/7 emergency ambulance services, medical transport, and compassionate funeral services across the region.',
            'footer_text' => '© ' . date('Y') . ' R.G. Ambulance Service. All rights reserved.',
            'hero_title' => 'Excellence in Emergency Medical Transport',
            'hero_subtitle' => 'When every second counts, trust our fleet of advanced life support ambulances and experienced medical professionals to deliver critical care on the move.',
            'hero_cta_text' => 'Explore Services',
            'hero_cta_link' => '/services',
            'hero_cta_secondary_text' => 'Contact Us',
            'hero_cta_secondary_link' => '/contact',
            'about_title' => 'A Legacy of Compassionate Care',
            'about_subtitle' => 'Serving communities with dedication since 2010',
            'about_description' => 'R.G. Ambulance Service has been at the forefront of emergency medical transport, combining state-of-the-art equipment with highly trained personnel to ensure the highest standard of patient care.',
            'about_mission_title' => 'Our Mission',
            'about_mission_text' => 'To provide rapid, reliable, and compassionate emergency medical transport services that save lives and support families in their most critical moments.',
            'about_vision_title' => 'Our Vision',
            'about_vision_text' => 'To be the most trusted name in emergency medical transport and healthcare logistics across the nation.',
            'services_title' => 'Our Medical Services',
            'services_subtitle' => 'Comprehensive ambulance and patient transport solutions tailored to every medical need.',
            'fleet_title' => 'Our Premium Fleet',
            'fleet_subtitle' => 'State-of-the-art ambulances equipped with advanced life support systems.',
            'equipment_title' => 'Medical Equipment Rental',
            'equipment_subtitle' => 'Hospital-grade medical equipment available for home care and clinical settings.',
            'mortuary_title' => 'Mortuary Services',
            'mortuary_subtitle' => 'Dignified facilities with professional care and support.',
            'gallery_title' => 'Our Gallery',
            'gallery_subtitle' => 'A visual journey through our operations and facilities.',
            'testimonials_title' => 'Client Testimonials',
            'testimonials_subtitle' => 'Trusted by thousands of families and healthcare institutions.',
            'blog_title' => 'News & Insights',
            'blog_subtitle' => 'Stay informed with the latest from our medical transport team.',
            'faq_title' => 'Frequently Asked Questions',
            'faq_subtitle' => 'Answers to common questions about our services and operations.',
            'contact_title' => 'Get In Touch',
            'contact_subtitle' => 'Our team is available 24/7 for emergencies and inquiries.',
            'cta_title' => 'Need Immediate Assistance?',
            'cta_description' => 'Our emergency response team is standing by around the clock. Call now for rapid medical transport.',
            'booking_title' => 'Book an Ambulance',
            'booking_subtitle' => 'Fill in your details and we\'ll get back to you within minutes',
            'coverage_title' => 'Our Service Coverage',
            'coverage_subtitle' => 'Providing emergency and non-emergency medical transport across multiple cities and regions',
            'about_ambulance_title' => 'Emergency & Non-Emergency Medical Transport',
            'about_ambulance_text' => 'Our ambulance fleet is available 24/7, equipped with state-of-the-art life-support systems. From Basic Life Support (BLS) for stable patients to fully-equipped Mobile ICUs for critical care transport, every vehicle is staffed by certified paramedics and EMTs. We offer GPS-tracked rapid dispatch, inter-city transfers, medical escort services, and event standby coverage.',
            'about_funeral_title' => 'Compassionate Funeral & Mortuary Care',
            'about_funeral_text' => 'Our funeral services provide dignified, respectful support during life\'s most difficult moments. Our premium fleet includes Mercedes-Benz hearses, glass-tempo vehicles for respectful public viewing, and temperature-controlled mortuary vans. We offer complete end-to-end mortuary care including embalming, preservation in VIP/MID/BASE freezer boxes, premium coffin selection, and certified flight repatriation worldwide.',
        ];

        foreach ($content as $key => $value) {
            Configuration::setValue($key, $value, 'content');
        }
    }
}
