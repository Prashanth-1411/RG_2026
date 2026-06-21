@props(['href' => '#', 'icon' => 'ti ti-circle', 'active' => false])

@php
$classes = $active
    ? 'flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-semibold text-white sidebar-hover'
    : 'flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium text-white/60 sidebar-hover transition-colors';
if ($active) {
    $classes .= ' nav-link-active';
}
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    <i class="{{ $icon }} text-lg {{ $active ? 'text-white' : 'text-white/40' }}"></i>
    <span>{{ $slot }}</span>
</a>
