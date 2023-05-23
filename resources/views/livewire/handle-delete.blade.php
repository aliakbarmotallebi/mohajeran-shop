
<div x-data="{show:false}"
type="button" class="flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">

<div
class="flex"
x-transition:enter="transform ease-out duration-300"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in duration-300"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
>
<button
    x-show="show"
    wire:click="remove"
    >
    <svg
        wire:target="remove"
        wire:loading.class.add="hidden"
        xmlns="http://www.w3.org/2000/svg"
        class="w-4 h-4"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        >
        <polyline points="20 6 9 17 4 12" />
    </svg>

    <svg wire:target="remove" wire:loading.class.remove="hidden" class="hidden animate-spin h-4 w-4 text-gray-800"   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
</button>
<span x-show="show" class="border-l-2 border-gray-200 pr-2 ml-2"></span>
<button @click="show = false" x-show="show">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="w-4 h-4 text-rose-500"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        >
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
    </svg>
</button>
</div>

<button
@click="show = true"
x-show="!show"
x-transition:enter="transform ease-out"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="w-4 h-4 text-rose-500"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        >
        <polyline points="3 6 5 6 21 6" />
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
        <line x1="10" y1="11" x2="10" y2="17" />
        <line x1="14" y1="11" x2="14" y2="17" />
    </svg>
</button>
</div>

