<x-app-layout :title="__('Other\'s list')">
    @forelse ($user->allowed as $allowing)
    <x-box>
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ $allowing->name }}</h2>
        </header>
        <x-auth-session-status class="text-red-600" :status="session('status')" />
        <table class="w-full text-gray-800 text-left mt-3">
            <thead class="border-b-2">
                <tr>
                    <th>{{ __("Name") }}</th>
                    <th>{{ __("Price") }}</th>
                    <th>URL</th>
                    <th>{{ __("Bought") }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($allowing->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}&nbsp;€</td>
                    <td><a href="{{ $item->url }}" target="_blank" class="text-blue-800 underline">{{ $item->url }}</a></td>
                    @if ($item->buyer_id)
                    <td>
                        <x-tag class="bg-green-200">{{ __("Yes") }}</x-tag>
                    </td>
                    @else
                    <td>
                        <x-tag>{{ __("No") }}</x-tag>
                    </td>
                    @endif
                    <td>
                        @if (!$item->buyer_id)
                        <a href="{{ route('list.buy', $item->id) }}" class="inline-flex items-center
                        px-2 py-1 my-1
                        border rounded-md
                        font-semibold text-xs uppercase tracking-widest
                        text-green-600 hover:text-white bg-white hover:bg-green-600  border-green-600
                        transition ease-in-out duration-200">
                            {{ __("Buy") }}
                        </a>
                        @elseif ($item->buyer_id == $user->id)
                        <x-tag class="bg-blue-200">{{ __("You already bought this one.") }}</x-tag>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="italic text-center py-3">{{ __("No item yet.") }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-box>
    @empty
    <x-box class="italic text-center">{{ __("You are not allowed to see any list yet.") }}</x-box>
    @endforelse
</x-app-layout>
