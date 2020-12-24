<div xmlns:livewire="" class="max-w-2xl">

    <form action="{{ route('admin.dashboard.store') }}" id="myform" method="POST">
        @csrf
        <input type="text" name="sandbox_name">
        <livewire:ui.media-library id="sandboxer" />
        <button type="submit" form="myform">submit</button>
    </form>
</div>



{{--<x-ui.modal type="danger">--}}
{{--    <x-slot name="button">--}}
{{--        <button type="button" x-spread="trigger">Open Modal</button>--}}
{{--    </x-slot>--}}
{{--    <x-slot name="header">My Modal Header</x-slot>--}}
{{--    <livewire:ui.media-library id="sandboxer" />--}}
{{--    <x-slot name="action">--}}
{{--        <button x-spread="trigger" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">--}}
{{--            Insert Media--}}
{{--        </button>--}}
{{--    </x-slot>--}}
{{--</x-ui.modal>--}}
