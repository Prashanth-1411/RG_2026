<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    public function index()
    {
        $items = ContactInquiry::latest()->paginate(10);
        return view('admin.contact_inquiries.index', compact('items'));
    }

    public function show($id)
    {
        $item = ContactInquiry::findOrFail($id);
        return view('admin.contact_inquiries.show', compact('item'));
    }

    public function destroy($id)
    {
        $item = ContactInquiry::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.contact_inquiries.index')
            ->with('success', 'ContactInquiry deleted successfully.');
    }
}
