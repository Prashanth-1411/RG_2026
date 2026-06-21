<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\Setting;
use App\Mail\ContactInquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'message' => 'required|string',
        ]);

        $validated['ip_address'] = $request->ip();
        $inquiry = ContactInquiry::create($validated);

        try {
            $recipient = Setting::value('email') ?? 'ebenezer.r@rgambulanceservice.com';
            Mail::to($recipient)->send(new ContactInquiryMail($inquiry));
        } catch (\Exception $e) {
            // Log but don't block the user's flow
            logger('Contact email send failed: ' . $e->getMessage());
        }

        return redirect()->route('frontend.contact')->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
