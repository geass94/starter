<div class="flex w-full items-center justify-between">
    <div class="block w-10/12">
        <x-forms.input
            type="radio"
            name="parent_id"
            wire:model="folder.id"
            wire:change="listLibrary({{ $data->id }})"
            value="{{ $data->id }}"
            label="{{ $data->name }}"
            for="folder-{{ $for }}-{{ $loop->depth }}-{{ $data->parent_id ?: 0 }}-{{ $loop->iteration }}" />
    </div>
    <div class="mt-3">
        @can('delete media')
        <x-ui.modal type="danger">
            <x-slot name="button">
                <button x-spread="trigger" type="button">
                    <svg class="w-5 h-5 bg-indigo-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                </button>
            </x-slot>
            <x-slot name="header">Please confirm your action</x-slot>
            <h1>Are you sure you want to delete <strong>'{{ $data->name }}'</strong> and all it's content?</h1>
            <x-slot name="action">
                <button x-spread="trigger" wire:click="deleteFolder({{ $data->id }})" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Yes
                </button>
            </x-slot>
        </x-ui.modal>
        @endcan
    </div>
</div>
