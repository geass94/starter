<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="bg-white shadow-xl">
            <livewire:ui.media-library id="media" />
        </div>
    </div>
</x-app-layout>
