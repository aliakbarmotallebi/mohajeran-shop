
<div class="cursor-pointer flex justify-center items-center">

    @if ( $entity->status == $entity->isAcceptedStatus() )
        <button wire:click="press()" class="flex items-center p-1.5 rounded-lg border border-green-200 text-green-800 hover:bg-green-300 bg-green-100  focus:ring-2 focus:ring-offset-2 ring-green-800">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </button>
    @else
        <button wire:click="press()" class="flex items-center p-1.5 rounded-lg border border-rose-200 text-rose-800 hover:bg-rose-300 bg-rose-100 focus:ring-2 focus:ring-offset-2 ring-rose-800">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4"
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
    @endif
</div>
