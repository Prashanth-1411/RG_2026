<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrCreate(['id' => 1]);
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::firstOrCreate(['id' => 1]);
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_primary' => 'nullable|string|max:50',
            'phone_secondary' => 'nullable|string|max:50',
            'phone_office' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:20',
            'logo' => 'nullable|string|max:255',
            'favicon' => 'nullable|string|max:255',
            'logo_width' => 'nullable|integer',
            'map_embed' => 'nullable|string',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'established_year' => 'nullable|string|max:10',
            'iso_certified' => 'nullable|boolean',
        ]);

        $settings->update($validated);

        return redirect()->route('admin.settings')
            ->with('success', 'Settings updated successfully.');
    }
}
