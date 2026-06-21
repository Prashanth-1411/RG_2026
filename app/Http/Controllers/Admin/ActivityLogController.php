<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $items = ActivityLog::with('user')->latest()->paginate(10);
        return view('admin.activity_logs.index', compact('items'));
    }

    public function show($id)
    {
        $item = ActivityLog::with('user')->findOrFail($id);
        return view('admin.activity_logs.show', compact('item'));
    }
}
