@props(['title' => null])
<div {{ $attributes->merge(['class' => 'rounded-2xl border border-[#E2D9CC] bg-[#F2EDE4] p-6 shadow-xs']) }}>
    @if ($title)
        <h3 class="text-lg font-bold text-[#1C1916] font-heading mb-2">{{ $title }}</h3>
    @endif
    <div class="text-[#1C1916]/80 text-sm">
        {{ $slot }}
    </div>
</div>
