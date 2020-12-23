@if ($type == 'radio' || $type == 'checkbox')
    <div>
        <label for="{{ $for }}" class="inline-flex items-center mt-3 text-sm justify-between w-full font-medium text-gray-700">
            <span>{{$label}}</span>
            <input
                {{ $attributes }}
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $for }}"
                placeholder="{{ $placeholder }}"
                value="{{ $value }}"
                class="form-radio h-2 w-2">
        </label>
        @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
@else
<div>
    <label for="{{ $for }}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <input
        {{ $attributes }}
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $for }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    @error($name)
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
@endif
