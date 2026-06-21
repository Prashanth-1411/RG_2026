@extends('admin.layouts.master')
@section('title', 'Team Members')
@section('page-title', 'Team Members')
@section('content')
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <div class="flex items-center justify-between p-5 border-b border-gray-100">
        <h5 class="text-sm font-bold text-gray-900">All Team Members</h5>
        <a href="{{ route('admin.team_members.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">
            <i class="ti ti-plus text-sm"></i> Add New
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Designation</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($teamMembers as $member)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-5 py-3 text-gray-900 font-medium">{{ $member->id }}</td>
                    <td class="px-5 py-3 text-gray-700">{{ $member->name }}</td>
                    <td class="px-5 py-3 text-gray-700">{{ $member->designation ?? 'N/A' }}</td>
                    <td class="px-5 py-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $member->status ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $member->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.team_members.show', $member) }}" class="p-1.5 rounded-lg text-cyan-600 hover:bg-cyan-50 transition-colors" title="View"><i class="ti ti-eye"></i></a>
                            <a href="{{ route('admin.team_members.edit', $member) }}" class="p-1.5 rounded-lg text-amber-600 hover:bg-amber-50 transition-colors" title="Edit"><i class="ti ti-pencil"></i></a>
                            <form action="{{ route('admin.team_members.destroy', $member) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg text-red-600 hover:bg-red-50 transition-colors" title="Delete"><i class="ti ti-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-12 text-center text-gray-400">No team members found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($teamMembers, 'links'))
    <div class="p-4 border-t border-gray-100">
        {{ $teamMembers->links() }}
    </div>
    @endif
</div>
@endsection