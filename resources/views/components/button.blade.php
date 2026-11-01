@props(['href' => null, 'variant' => 'primary'])
@php
    $classes = match($variant) {
        'secondary' => 'bg-[#E5DFD4] hover:bg-[#DCD5C8] text-[#1C1916] border border-[#D2C8B8]',
        'outline' => 'bg-transparent hover:bg-[#EAE4D9] text-[#1C1916] border border-[#D2C8B8]',
        'inverted' => 'bg-[#1C1916] hover:bg-[#2C2723] text-white',
        default => 'bg-[#A13E0C] hover:bg-[#883208] text-white font-medium shadow-xs',
    };
@endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "inline-flex items-center justify-center px-4 py-2 rounded-xl text-sm transition-colors {$classes}"]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => "inline-flex items-center justify-center px-4 py-2 rounded-xl text-sm transition-colors {$classes}"]) }}>
        {{ $slot }}
    </button>
@endif
