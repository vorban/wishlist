<x-app-layout :title="__('My list')">
    <x-slot:actions>
        <a href="{{ route('my-list.add') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            {{ __("Add an item") }}
        </a>
    </x-slot:actions>

    <x-box>
        <table class="w-full text-gray-800 text-left">
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
                @forelse ($user->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}&nbsp;€</td>
                    <td><a href="{{ $item->url }}" class="text-blue-800 underline">{{ $item->url }}</a></td>
                    @if ($item->buyer_id)
                    <td><x-tag class="bg-green-200">{{ __("Yes") }}</x-tag></td>
                    @else
                    <td><x-tag>{{ __("No") }}</x-tag></td>
                    @endif
                    <td><a href="{{ route('my-list.delete', $item->id) }}" class="inline-flex items-center
                        px-2 py-1 my-1
                        border rounded-md
                        font-semibold text-xs uppercase tracking-widest
                        text-red-600 hover:text-white bg-white hover:bg-red-600  border-red-600
                        transition ease-in-out duration-200">
                        {{ __("Delete") }}
                    </a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="italic text-center py-3">{{ __("No item.") }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-box>


</x-app-layout>
