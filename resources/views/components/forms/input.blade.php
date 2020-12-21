<div>
    <label for="{{ $for }}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <input
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
