<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
        <x-forms.input type="{{ $type }}" name="{{ $name }}" label="{{ $label }}" wire:model="value" for="{{ $for }}" />
        <x-forms.button type="button" label="Add" wire:click="add({{ $i }})" />
    </div>
    @foreach($inputs as $key => $input)
        <div>
            <x-forms.input type="{{ $type }}" name="{{ $name }}" label="{{ $label }}" value="{{ $input }}" for="{{ $for.'-'.$loop->iteration }}" />
            <x-forms.button type="button" label="Remove" wire:click="remove({{ $key }})" />
        </div>
    @endforeach
</div>
