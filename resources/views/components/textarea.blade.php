@props(['disabled' => false])

<textarea {{ $attributes->merge(['class' => "mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-900", "rows" => "3"]) }}>
{{ old($attributes->get('name')) }}</textarea>
