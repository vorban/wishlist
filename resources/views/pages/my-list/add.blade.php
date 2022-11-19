<x-app-layout :title="__('Add an item')">
    <x-box>
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">{{ __('Add an item') }}</h2>
                <p class="mt-1 text-sm text-gray-600">{{ __("You can add an item any time.") }}</p>
            </header>

            <form method="post" action="{{ route('my-list.add') }}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :placeholder="__('My item')" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="url" :value="__('URL')" />
                    <x-text-input id="url" name="url" type="text" class="mt-1 block w-full"
                        placeholder="https://www.google.com" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('url')" />
                </div>

                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="number" step="0.01" min="0" class="mt-1 block w-full"
                        placeholder="12.99" required autocomplete="price" />
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea id="description" name="description"></x-textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
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
</x-app-layout>
