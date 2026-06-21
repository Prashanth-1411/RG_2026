<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ThemeController extends Controller
{
    public function index()
    {
        $settings = Cache::get('theme_settings', [
            'primary_color' => '#1e40af',
            'secondary_color' => '#1e3a8a',
            'accent_color' => '#2563eb',
            'bg_color' => '#f8fafc',
            'border_radius' => '12',
            'card_padding' => '24',
            'shadow_intensity' => '50',
            'container_width' => '1280',
            'body_font' => 'Inter',
            'heading_font' => 'Inter',
            'body_font_size' => '14',
            'heading_font_size' => '16',
            'button_height' => '44',
            'button_radius' => '8',
            'button_font_size' => '14',
            'button_font_weight' => '600',
        ]);

        return view('admin.theme', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = $request->only([
            'primary_color', 'secondary_color', 'accent_color', 'bg_color',
            'border_radius', 'card_padding', 'shadow_intensity', 'container_width',
            'body_font', 'heading_font', 'body_font_size', 'heading_font_size',
            'button_height', 'button_radius', 'button_font_size', 'button_font_weight',
        ]);

        Cache::forever('theme_settings', $settings);

        return redirect()->route('admin.theme')->with('success', 'Theme settings saved!');
    }
}
