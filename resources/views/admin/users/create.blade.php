<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="container mx-auto my-5">
        <div class="max-w-7xl px-4">
            <div class="bg-white shadow-xl">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <div class="p-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                            <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <form action="{{route('admin.users.store')}}" method="POST">
                            @csrf
                            <div class="shadow overflow-hidden">
                                <div class="p-4 bg-white">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <x-forms.input type="text" name="first_name" label="First Name" for="first-name"/>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <x-forms.input type="text" name="last_name" label="Last Name" for="last-name"/>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <x-forms.input type="email" name="email" label="Email" for="email"/>
                                        </div>
                                        @can('grant roles')
                                            <div class="col-span-6 sm:col-span-3">
                                                <x-forms.select for="roles" name="role" label="Roles">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </x-forms.select>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <x-forms.button type="submit" label="Save" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:forms.dynamic-input type="text" label="Dynamic input" for="d-input" name="d_input[]" />
</x-app-layout>
