
@props(['active' => false]) # TODO: remove blank line above

@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500';

    if ($active) $classes .= ' bg-blue-500 text-white';
@endphp # TODO: remove balnk 2 lines below



<a {{ $attributes(['class'=> $classes]) }}>
    {{ $slot }}
</a>