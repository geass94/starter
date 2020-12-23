@if(is_null($data->parent_id))
    @include('components.livewire.media-library.folder-tree-entry', ['data' => $folder, 'loop' => $loop])
@endif
@if($data->children)
<ul>
    @foreach($data->children as $folder)
        <li class="pl-4">
            @include('components.livewire.media-library.folder-tree-entry', ['data' => $folder, 'loop' => $loop])
            @if(isset($folder->children))
                <ul>
                    @include('components.livewire.media-library.folders-tree', ['data' => $folder, 'loop' => $loop])
                </ul>
            @endif
        </li>
    @endforeach
</ul>
@endif
