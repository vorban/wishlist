@props(['label' => ''])

<div>
    <span>{{ $label }}</span>
    <br>
    <span class="font-semibold text-2xl text-gray-500 uppercase tracking-widest">{{ $slot }}</span>
</div>
