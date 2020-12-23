@if($data->children)
<ul>
    @foreach($data->children as $child)
        <li class="pl-4">
            <x-forms.input
                type="radio"
                name="parent_id"
                wire:model="folder.id"
                wire:change="listLibrary({{ $child->id }})"
                value="{{ $child->id }}"
                label="{{ $child->name }}"
                for="folder-{{ $loop->depth }}-{{ $child->parent_id ?: 0 }}-{{ $loop->iteration }}" />
            @if(isset($child->children))
                <ul>
                    @include('components.livewire.media-library.folders-tree', ['data' => $child, 'loop' => $loop])
                </ul>
            @endif
        </li>
    @endforeach
</ul>
@endif
