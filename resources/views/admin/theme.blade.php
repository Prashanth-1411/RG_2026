@extends('admin.layouts.master')

@section('title', 'Theme Customizer')
@section('page-title', 'Theme Customizer')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Sidebar preview --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl border border-gray-200 p-6 sticky top-6">
            <h3 class="text-sm font-bold text-gray-900 mb-1">Live Preview</h3>
            <p class="text-xs text-gray-400 mb-4">Changes reflect instantly</p>
            <div id="theme-preview" class="rounded-lg border border-gray-200 overflow-hidden">
                <div class="h-8" style="background: var(--preview-primary, #1e40af);"></div>
                <div class="p-4 space-y-2">
                    <div class="h-3 rounded" style="background: var(--preview-primary, #1e40af); width: 60%;"></div>
                    <div class="h-2 rounded bg-gray-200" style="width: 80%;"></div>
                    <div class="h-2 rounded bg-gray-200" style="width: 40%;"></div>
                    <div class="flex gap-2 mt-3">
                        <div class="h-6 w-16 rounded" style="background: var(--preview-primary, #1e40af);"></div>
                        <div class="h-6 w-16 rounded border" style="border-color: var(--preview-primary, #1e40af);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Settings --}}
    <div class="lg:col-span-2 space-y-6">
        <form id="theme-form" method="POST" action="{{ route('admin.theme.update') }}">
            @csrf

            {{-- Colors --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="text-sm font-bold text-gray-900 mb-4">Colors</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Primary Color</label>
                        <div class="flex gap-2">
                            <input type="color" name="primary_color" value="{{ $settings['primary_color'] ?? '#1e40af' }}" class="w-10 h-10 rounded-lg border border-gray-200 cursor-pointer">
                            <input type="text" name="primary_color_hex" value="{{ $settings['primary_color'] ?? '#1e40af' }}" class="flex-1 rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Secondary Color</label>
                        <div class="flex gap-2">
                            <input type="color" name="secondary_color" value="{{ $settings['secondary_color'] ?? '#1e3a8a' }}" class="w-10 h-10 rounded-lg border border-gray-200 cursor-pointer">
                            <input type="text" name="secondary_color_hex" value="{{ $settings['secondary_color'] ?? '#1e3a8a' }}" class="flex-1 rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Accent Color</label>
                        <div class="flex gap-2">
                            <input type="color" name="accent_color" value="{{ $settings['accent_color'] ?? '#2563eb' }}" class="w-10 h-10 rounded-lg border border-gray-200 cursor-pointer">
                            <input type="text" name="accent_color_hex" value="{{ $settings['accent_color'] ?? '#2563eb' }}" class="flex-1 rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Background Color</label>
                        <div class="flex gap-2">
                            <input type="color" name="bg_color" value="{{ $settings['bg_color'] ?? '#f8fafc' }}" class="w-10 h-10 rounded-lg border border-gray-200 cursor-pointer">
                            <input type="text" name="bg_color_hex" value="{{ $settings['bg_color'] ?? '#f8fafc' }}" class="flex-1 rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Spacing & Sizes --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="text-sm font-bold text-gray-900 mb-4">Spacing & Border Radius</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Border Radius (px)</label>
                        <input type="range" name="border_radius" min="0" max="24" value="{{ $settings['border_radius'] ?? '12' }}" class="w-full accent-royal-500">
                        <span class="text-xs text-gray-400" id="radius-value">{{ $settings['border_radius'] ?? '12' }}px</span>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Card Padding (px)</label>
                        <input type="range" name="card_padding" min="12" max="40" value="{{ $settings['card_padding'] ?? '24' }}" class="w-full accent-royal-500">
                        <span class="text-xs text-gray-400" id="padding-value">{{ $settings['card_padding'] ?? '24' }}px</span>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Card Shadow Intensity</label>
                        <input type="range" name="shadow_intensity" min="0" max="100" value="{{ $settings['shadow_intensity'] ?? '50' }}" class="w-full accent-royal-500">
                        <span class="text-xs text-gray-400" id="shadow-value">{{ $settings['shadow_intensity'] ?? '50' }}%</span>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Container Width (px)</label>
                        <input type="range" name="container_width" min="960" max="1600" step="20" value="{{ $settings['container_width'] ?? '1280' }}" class="w-full accent-royal-500">
                        <span class="text-xs text-gray-400" id="width-value">{{ $settings['container_width'] ?? '1280' }}px</span>
                    </div>
                </div>
            </div>

            {{-- Fonts --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="text-sm font-bold text-gray-900 mb-4">Typography</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Body Font</label>
                        <select name="body_font" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                            <option value="Inter" {{ ($settings['body_font'] ?? 'Inter') === 'Inter' ? 'selected' : '' }}>Inter</option>
                            <option value="Figtree" {{ ($settings['body_font'] ?? '') === 'Figtree' ? 'selected' : '' }}>Figtree</option>
                            <option value="Nunito" {{ ($settings['body_font'] ?? '') === 'Nunito' ? 'selected' : '' }}>Nunito</option>
                            <option value="Poppins" {{ ($settings['body_font'] ?? '') === 'Poppins' ? 'selected' : '' }}>Poppins</option>
                            <option value="Plus Jakarta Sans" {{ ($settings['body_font'] ?? '') === 'Plus Jakarta Sans' ? 'selected' : '' }}>Plus Jakarta Sans</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Heading Font</label>
                        <select name="heading_font" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                            <option value="Inter" {{ ($settings['heading_font'] ?? 'Inter') === 'Inter' ? 'selected' : '' }}>Inter</option>
                            <option value="Figtree" {{ ($settings['heading_font'] ?? '') === 'Figtree' ? 'selected' : '' }}>Figtree</option>
                            <option value="Playfair Display" {{ ($settings['heading_font'] ?? '') === 'Playfair Display' ? 'selected' : '' }}>Playfair Display</option>
                            <option value="Poppins" {{ ($settings['heading_font'] ?? '') === 'Poppins' ? 'selected' : '' }}>Poppins</option>
                            <option value="Plus Jakarta Sans" {{ ($settings['heading_font'] ?? '') === 'Plus Jakarta Sans' ? 'selected' : '' }}>Plus Jakarta Sans</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Body Font Size (px)</label>
                        <input type="number" name="body_font_size" value="{{ $settings['body_font_size'] ?? '14' }}" min="12" max="20" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Heading Font Size (px)</label>
                        <input type="number" name="heading_font_size" value="{{ $settings['heading_font_size'] ?? '16' }}" min="14" max="28" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                    </div>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h3 class="text-sm font-bold text-gray-900 mb-4">Button Styles</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Button Height (px)</label>
                        <input type="range" name="button_height" min="32" max="56" value="{{ $settings['button_height'] ?? '44' }}" class="w-full accent-royal-500">
                        <span class="text-xs text-gray-400" id="btn-height-value">{{ $settings['button_height'] ?? '44' }}px</span>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Button Border Radius (px)</label>
                        <input type="range" name="button_radius" min="0" max="24" value="{{ $settings['button_radius'] ?? '8' }}" class="w-full accent-royal-500">
                        <span class="text-xs text-gray-400" id="btn-radius-value">{{ $settings['button_radius'] ?? '8' }}px</span>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Button Font Size (px)</label>
                        <input type="number" name="button_font_size" value="{{ $settings['button_font_size'] ?? '14' }}" min="11" max="18" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 mb-1 block">Button Font Weight</label>
                        <select name="button_font_weight" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-royal-500 focus:ring-1 focus:ring-royal-500 outline-none">
                            <option value="500" {{ ($settings['button_font_weight'] ?? '600') === '500' ? 'selected' : '' }}>Medium (500)</option>
                            <option value="600" {{ ($settings['button_font_weight'] ?? '600') === '600' ? 'selected' : '' }}>Semi Bold (600)</option>
                            <option value="700" {{ ($settings['button_font_weight'] ?? '') === '700' ? 'selected' : '' }}>Bold (700)</option>
                            <option value="800" {{ ($settings['button_font_weight'] ?? '') === '800' ? 'selected' : '' }}>Extra Bold (800)</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="px-6 py-3 bg-royal-500 text-white rounded-lg text-sm font-bold hover:bg-royal-600 transition-colors">
                <i class="ti ti-device-floppy me-2"></i>Save Theme Settings
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Live preview: update colors as user types
    document.querySelectorAll('input[type="color"], input[name$="_hex"], input[name="border_radius"], input[name="card_padding"], input[name="shadow_intensity"], input[name="container_width"], input[name="button_height"], input[name="button_radius"]').forEach(el => {
        el.addEventListener('input', function() {
            updatePreview();
        });
    });

    function updatePreview() {
        const primary = document.querySelector('[name="primary_color"]')?.value || '#1e40af';
        document.getElementById('theme-preview').style.setProperty('--preview-primary', primary);

        // Update range display values
        document.querySelectorAll('input[type="range"]').forEach(el => {
            const label = document.getElementById(el.name + '-value') || document.getElementById(el.name.replace('_', '-') + '-value');
            if (label) {
                const suffix = el.name.includes('intensity') ? '%' : el.name.includes('width') ? 'px' : 'px';
                label.textContent = el.value + suffix;
            }
        });
    }
</script>
@endpush
