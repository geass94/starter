<div class="flex p-4 rounded-md shadow-lg bg-gray-100">
    <div class="p-4 bg-gray-200 max-w-xs w-full border-r border-gray-50">
        <form wire:submit.prevent="createFolder">
            <div>
                <x-forms.input type="text" wire:model="folder.name" label="Folder Name" for="folder-name" name="folder_name" />
                <x-forms.button type="submit" label="Create"/>
            </div>

        <ul class="w-full">
            <li> <x-forms.input type="radio" name="parent_id" wire:model="folder.id" value="root" checked="checked" label="Public" for="folder-root" /> </li>
            @foreach($folders as $folder)
                <li>
                    <x-forms.input type="radio" name="parent_id"
                                   wire:model="folder.id"
                                   wire:change="listLibrary({{ $folder->id }})"
                                   value="{{ $folder->id }}" label="{{ $folder->name }}"
                                   for="folder-{{ $loop->depth }}-{{ $folder->parent_id ?: 0 }}-{{ $loop->iteration }}" />
                    @if($folder->children)
                        @include('components.livewire.media-library.folders-tree', ['data' => $folder, 'loop' => $loop])
                    @endif
                </li>
            @endforeach

        </ul>
        </form>
    </div>
    <div class="bg-white w-full flex flex-col">
        <div class="block w-full p-4">
            <form wire:submit.prevent="upload">
                <x-forms.input type="file" multiple label="Choose Files" for="files" name="files" wire:model="files" />
                <br />
                <x-forms.button type="submit" label="Upload Files" />
            </form>
        </div>
        <div class="w-full inline-flex flex-wrap flex-row gap-4 xl:max-h-96 overflow-y-scroll p-4">
            @foreach($media as $item)
            <div x-data="mediaSelected()" class="bg-gray-800 text-white flex justify-around" style="max-width: 150px; max-height: 150px">
                <img x-spread="trigger" class="max-w-full max-h-full border-green-600" x-bind:class="{ 'border-solid border-2': checked }" src="{{ $item->url }}" alt="{{ $item->name }}">
                <input type="checkbox" x-bind:checked="checked" name="media[]" value="{{ $item->id }}" class="hidden">
            </div>
            @endforeach
        </div>
    </div>
</div>
