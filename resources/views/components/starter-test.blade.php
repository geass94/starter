<div xmlns:livewire="" class="max-w-2xl">
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <livewire:counter />
    <form>
        <x-forms.input name="first_name" for="first-name" label="First Name" />
        <x-forms.select name="country" for="country" label="Choose country">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </x-forms.select>
    </form>

</div>
