<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-starter-test />

            <x-jet-welcome />


            <livewire:ui.media-library id="test" />

            <livewire:forms.dynamic-input type="text" label="Dynamic input" for="d-input" name="d_input[]" />

        </div>
    </div>
</x-app-layout>
