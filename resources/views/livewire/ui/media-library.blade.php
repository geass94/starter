<div class="flex p-4 rounded-md shadow-lg bg-gray-100" id="media-library-{{ $for }}">
    <div class="p-4 bg-gray-200 max-w-xs w-full border-r border-gray-50">
        <form id="media-library-folder-form-{{ $for }}" wire:submit.prevent="createFolder">
            <div>
                <x-forms.input type="text" wire:model="folder.name" label="Folder Name" for="folder-name-{{ $for }}" name="folder_name" />
                <x-forms.button type="submit" label="Create"/>
            </div>

        <ul class="w-full">
            <li>
                <x-forms.input type="radio" name="parent_id" wire:model="folder.id" value="root" checked="checked" label="Public" for="folder-{{ $for }}root" />
            </li>
            @foreach($folders as $folder)
                <li>

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
            <form id="media-library-files-form-{{ $for }}" wire:submit.prevent="upload">
                <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="files-{{ $for }}" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input type="file" multiple label="Choose Files" id="files-{{ $for }}" name="files" wire:model="files" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                </div>
                <br />
                <x-forms.button type="submit" label="Upload Files" />
            </form>
        </div>
        <div class="w-full inline-flex flex-wrap flex-row gap-4 xl:max-h-96 overflow-y-scroll p-4">
            @foreach($media as $item)
            <div x-data="mediaSelected()" class="bg-gray-800 text-white flex justify-around" style="max-width: 350px; max-height: 350px">
                <img
                    x-spread="trigger"
                    class="max-w-full max-h-full border-indigo-500"
                    x-bind:class="{ 'border-solid border-4': checked }"
                    src="{{ $item->url }}"
                    alt="{{ $item->name }}">
                <input type="checkbox" x-bind:checked="checked" name="media[]" value="{{ $item->id }}" class="hidden">
            </div>
            @endforeach
        </div>
    </div>
</div>
