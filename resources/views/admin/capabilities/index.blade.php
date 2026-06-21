@extends('admin.layouts.master')
@section('title', 'Manage Capabilities')
@section('page-title', 'Manage Capabilities')
@section('content')
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <div class="flex items-center justify-between p-5 border-b border-gray-100">
        <h5 class="text-sm font-bold text-gray-900">All Capabilities</h5>
        <a href="{{ route('admin.capabilities.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">
            <i class="ti ti-plus text-sm"></i> Add New
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                    @foreach($columns as $col)
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">{{ $col }}</th>
                    @endforeach
                    <th class="text-right px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-5 py-3 text-gray-900 font-medium">{{ $item->id }}</td>
                    @foreach($columns as $field => $label)
                    <td class="px-5 py-3 text-gray-700">{{ Str::limit($item->{$field}, 50) }}</td>
                    @endforeach
                    <td class="px-5 py-3 text-right">
                        <div class="flex items-center gap-1 justify-end">
                            <a href="{{ route('admin.capabilities.show', $item) }}" class="p-1.5 rounded-lg text-cyan-600 hover:bg-cyan-50 transition-colors" title="View"><i class="ti ti-eye"></i></a>
                            <a href="{{ route('admin.capabilities.edit', $item) }}" class="p-1.5 rounded-lg text-amber-600 hover:bg-amber-50 transition-colors" title="Edit"><i class="ti ti-pencil"></i></a>
                            <form action="{{ route('admin.capabilities.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg text-red-600 hover:bg-red-50 transition-colors" title="Delete"><i class="ti ti-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ count($columns) + 2 }}" class="px-5 py-12 text-center text-gray-400">
                        <i class="ti ti-inbox text-3xl block mb-2"></i>
                        No capabilities found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($items, 'links'))
    <div class="p-4 border-t border-gray-100">
        {{ $items->links() }}
    </div>
    @endif
</div>
@endsection