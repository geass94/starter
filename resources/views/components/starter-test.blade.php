<div xmlns:livewire="" class="max-w-2xl">
    <span
        x-data="{ isOn: false }"
        @click="isOn = !isOn"
        :aria-checked="isOn"
        :class="{'bg-indigo-600': isOn, 'bg-gray-200': !isOn }"
        class="bg-gray-200 relative inline-block flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline"
        role="checkbox"
        tabindex="0"
    >
  <span
      aria-hidden="true"
      :class="{'translate-x-5': isOn, 'translate-x-0': !isOn }"
      class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200"
  ></span>
</span>

    <x-ui.modal>
        <x-slot name="header">My Modal Header</x-slot>
            My some shitty text goes to body
        <x-slot name="action">
            <button x-spread="trigger" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                My Action Text
            </button>
        </x-slot>
    </x-ui.modal>

</div>
