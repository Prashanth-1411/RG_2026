<?php

namespace App\Services;

use App\Models\Configuration;

class ThemeService
{
    protected static array $defaults = [
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
        'button_font_size' => '14',
        'button_font_weight' => '600',
        'card_padding' => '32',
        'border_radius' => '8',
        'enable_glassmorphism' => '1',
        'enable_dark_mode' => '0',
        'enable_animations' => '1',
        'enable_parallax' => '1',
        'animation_speed' => 'normal',
        'container_width' => '1320',
        'hero_background' => '',
        'hero_video' => '',
        'card_style' => 'elevated',
        'button_style' => 'solid',
    ];

    public static function all(): array
    {
        return cache()->remember('theme_settings', 3600, function () {
            $stored = Configuration::getGroup('theme');
            $stored = array_filter($stored, fn($v) => $v !== '' && $v !== null);
            return array_merge(static::$defaults, $stored);
        });
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        $theme = static::all();
        return $theme[$key] ?? $default ?? static::$defaults[$key] ?? null;
    }

    public static function cssVariables(): string
    {
        $t = static::all();

        $speed = match ($t['animation_speed'] ?? 'normal') {
            'slow' => '1.2s',
            'fast' => '0.4s',
            default => '0.7s',
        };

        $val = fn($key, $default) => (!empty($t[$key]) ? $t[$key] : $default);

        return implode("\n", [
            "--rg-primary: {$t['primary_color']};",
            "--rg-secondary: {$t['secondary_color']};",
            "--rg-accent: {$t['accent_color']};",
            "--rg-bg: {$t['bg_color']};",
            "--rg-text: {$t['text_color']};",
            "--rg-heading: {$t['heading_color']};",
            "--rg-body-font: '{$val('body_font', 'Outfit')}', sans-serif;",
            "--rg-heading-font: '{$val('heading_font', 'Cormorant Garamond')}', serif;",
            "--rg-body-size: {$val('body_font_size', '16')}px;",
            "--rg-heading-size: {$val('heading_font_size', '48')}px;",
            "--rg-btn-height: {$val('button_height', '52')}px;",
            "--rg-btn-radius: {$val('button_radius', '4')}px;",
            "--rg-btn-size: {$val('button_font_size', '14')}px;",
            "--rg-btn-weight: {$val('button_font_weight', '600')};",
            "--rg-card-padding: {$val('card_padding', '32')}px;",
            "--rg-radius: {$val('border_radius', '8')}px;",
            "--rg-container: {$val('container_width', '1320')}px;",
            "--rg-transition: {$speed};",
            "--rg-glass: " . ($val('enable_glassmorphism', '1') == '1' ? '1' : '0') . ";",
            "--rg-animations: " . ($val('enable_animations', '1') == '1' ? '1' : '0') . ";",
        ]);
    }

    public static function clearCache(): void
    {
        cache()->forget('theme_settings');
        cache()->forget('site_content');
    }
}
