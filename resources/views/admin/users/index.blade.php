<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="container mx-auto my-5">
        <div class="max-w-7xl px-4">
            <div class="bg-white shadow-xl">
                <table class="container table-auto border-collapse border border-green-800">
                    <thead>
                    <tr>
                        <th class="border border-green-600">Username</th>
                        <th class="border border-green-600">Email</th>
                        <th class="border border-green-600">Role</th>
                        <th class="border border-green-600">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="p-4 border border-green-600 ...">{{ $user->name }}</td>
                            <td class="p-4 border border-green-600 ...">{{ $user->email }}</td>
                            <td class="p-4 border border-green-600 ...">{{ implode(", ", $user->roles->pluck('name')->toArray()) }}</td>
                            <td class="p-4 border border-green-600 ..."><a href="{{ route('admin.users.edit', [ $user->id ]) }}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <livewire:forms.dynamic-input type="text" label="Dynamic input" for="d-input" name="d_input[]" />
</x-app-layout>
