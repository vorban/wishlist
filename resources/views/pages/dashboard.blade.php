<x-app-layout :title="__('Dashboard')">
    <div class="flex text-gray-800 text-center">
        <x-box wrapper-class="grow">
            <x-stat :label="__('Items in my list')">{{ $user->items()->count() }}</x-stat>
        </x-box>
        <x-box wrapper-class="grow">
            <x-stat :label="__('Users who can see my list')">{{ $user->allowing()->count() }}</x-stat>
        </x-box>
        <x-box wrapper-class="grow">
            <x-stat :label="__('Users whom I can see the list')">{{ $user->allowed()->count() }}</x-stat>
        </x-box>
</x-app-layout>
