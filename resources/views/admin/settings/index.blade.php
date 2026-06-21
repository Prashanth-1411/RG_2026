@extends('admin.layouts.master')

@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')
<div class="max-w-4xl mx-auto">
    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf

        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Company Information</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Company Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name', $settings->company_name ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Tagline</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $settings->tagline ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Email</label>
                    <input type="email" name="email" value="{{ old('email', $settings->email ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Phone (Primary)</label>
                    <input type="text" name="phone_primary" value="{{ old('phone_primary', $settings->phone_primary ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Phone (Secondary)</label>
                    <input type="text" name="phone_secondary" value="{{ old('phone_secondary', $settings->phone_secondary ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Phone (Office)</label>
                    <input type="text" name="phone_office" value="{{ old('phone_office', $settings->phone_office ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">WhatsApp</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Address</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Address</label>
                    <textarea name="address" rows="3" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">{{ old('address', $settings->address ?? '') }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">City</label>
                    <input type="text" name="city" value="{{ old('city', $settings->city ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">State</label>
                    <input type="text" name="state" value="{{ old('state', $settings->state ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Pincode</label>
                    <input type="text" name="pincode" value="{{ old('pincode', $settings->pincode ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Branding</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Logo URL</label>
                    <input type="text" name="logo" value="{{ old('logo', $settings->logo ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Favicon URL</label>
                    <input type="text" name="favicon" value="{{ old('favicon', $settings->favicon ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Logo Width (px)</label>
                    <input type="number" name="logo_width" value="{{ old('logo_width', $settings->logo_width ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Social Media</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Facebook</label>
                    <input type="text" name="facebook" value="{{ old('facebook', $settings->facebook ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Twitter</label>
                    <input type="text" name="twitter" value="{{ old('twitter', $settings->twitter ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Instagram</label>
                    <input type="text" name="instagram" value="{{ old('instagram', $settings->instagram ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">LinkedIn</label>
                    <input type="text" name="linkedin" value="{{ old('linkedin', $settings->linkedin ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">YouTube</label>
                    <input type="text" name="youtube" value="{{ old('youtube', $settings->youtube ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Other Settings</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Google Maps Embed</label>
                    <textarea name="map_embed" rows="3" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">{{ old('map_embed', $settings->map_embed ?? '') }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Established Year</label>
                    <input type="text" name="established_year" value="{{ old('established_year', $settings->established_year ?? '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="flex items-end pb-2.5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="iso_certified" value="1" {{ old('iso_certified', $settings->iso_certified ?? false) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-500 focus:ring-blue-500">
                        <span class="text-xs font-semibold text-gray-600">ISO Certified</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 text-white rounded-lg text-sm font-bold transition-colors" style="background: var(--theme-primary);">
                <i class="ti ti-device-floppy me-2"></i>Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
