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
                                            <x-forms.input type="text" name="first_name" label="First Name"/>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <x-forms.input type="text" name="last_name" label="Last Name"/>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <x-forms.input type="email" name="email" label="Email"/>
                                        </div>
                                        @can('grant roles')
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                                                <select id="roles" name="country" name="role" autocomplete="role" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
