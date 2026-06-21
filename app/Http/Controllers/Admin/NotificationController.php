<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $items = Notification::forCurrentUser()->latest()->paginate(10);
        return view('admin.notifications.index', compact('items'));
    }

    public function markAsRead($id)
    {
        $item = Notification::findOrFail($id);
        $item->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Notification marked as read.');
    }
}
