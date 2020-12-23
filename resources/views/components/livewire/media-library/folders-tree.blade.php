@if($data->children)
<ul>
    @foreach($data->children as $folder)
        <li class="pl-4">
            <div class="flex w-full items-center justify-between">
                <div class="block w-10/12">
                    <x-forms.input type="radio" name="parent_id"
                                   wire:model="folder.id"
                                   wire:change="listLibrary({{ $folder->id }})"
                                   value="{{ $folder->id }}" label="{{ $folder->name }}"
                                   for="folder-{{ $for }}-{{ $loop->depth }}-{{ $folder->parent_id ?: 0 }}-{{ $loop->iteration }}" />
                </div>
                <div class="mt-3">
                    <button type="button" wire:click="delete({{ $folder->id }})">
                        <svg class="w-5 h-5 bg-indigo-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                    </button>
                </div>
            </div>
            @if(isset($child->children))
                <ul>
                    @include('components.livewire.media-library.folders-tree', ['data' => $folder, 'loop' => $loop])
                </ul>
            @endif
        </li>
    @endforeach
</ul>
@endif
