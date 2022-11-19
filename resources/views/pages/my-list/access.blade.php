<x-app-layout :title="__('Who can see my list?')">
    <x-slot:css>
        @vite(['node_modules/slim-select/dist/slimselect.min.css'])
    </x-slot:css>
    <x-slot:js>
        <script>
            window.usersAjaxRoute = "{{ route('my-list.users') }}";
        </script>
        @vite(['resources/js/pages/access.js'])
    </x-slot:js>
    <x-box>
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">{{ __('Include someone') }}</h2>
                <p class="mt-1 text-sm text-gray-600">{{ __("You can include or exclude anyone whenever.") }}</p>
            </header>

            <form method="post" action="{{ route('my-list.access') }}" class="mt-6 space-y-6">
                @csrf
                <div>
                    <x-input-label for="users" :value="__('Users')" />
                    <select id="users" name="users[]"class="mt-1 block w-full text-gray-800" placeholder="{{ __('Choose some users.') }}" multiple>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('users')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __("Saved.") }}</p>
                    @endif
                </div>
            </form>
        </section>
    </x-box>

    <x-box>
        <table class="w-full text-gray-800 text-left">
            <thead class="border-b-2">
                <tr>
                    <th>{{ __("Name") }}</th>
                    <th>{{ __("Email") }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($user->allowing as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td><a href="{{ route('my-list.revoke', $u->id) }}" class="inline-flex items-center
                        px-2 py-1 my-1
                        border rounded-md
                        font-semibold text-xs uppercase tracking-widest
                        text-red-600 hover:text-white bg-white hover:bg-red-600  border-red-600
                        transition ease-in-out duration-200">
                            {{ __("Revoke") }}
                        </a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="italic text-center py-3">{{ __("No user yet.") }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-box>
</x-app-layout>
