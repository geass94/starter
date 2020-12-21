<div class="flex p-1 bg-gray-700 text-white" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <x-forms.input type="{{ $type }}" name="{{ $name }}" label="{{ $label }}" for="{{ $for }}" />
        <x-forms.button type="button" label="Add more" wire:click="add({{ $i }})" />
    </div>
    @foreach($inputs as $key => $value)
        <div>
            <x-forms.input type="{{ $type }}" name="{{ $name }}" label="{{ $label }}" for="{{ $for.'-'.$loop->iteration }}" />
            <x-forms.button type="button" label="Remove" wire:click="remove({{ $key }})" />
        </div>
    @endforeach
</div>
