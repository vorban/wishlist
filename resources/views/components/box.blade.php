@props(['wrapperClass' => ''])

<div class="my-12 max-w-7xl mx-auto sm:px-6 lg:px-8 {{ $wrapperClass }}">
    <div {{ $attributes->merge(['class' => "bg-white overflow-visible shadow-sm sm:rounded-lg p-6"]) }}>
        {{ $slot }}
    </div>
</div>
