@props([
    'footer',
])
<div>
    <div
        x-data="{ show: @entangle($attributes->wire('model')).defer }"
        x-show="show"
        x-cloak
        x-on:keydown.escape.window="show = false"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full  justify-center items-end md:items-center flex bg-gray-900/40 min-h-screen">
        <div x-show="show" class="relative p-0 md:p-4 w-full md:w-1/2 h-full md:h-auto">
            <!-- Modal content -->
            <div x-show="show" class="relative bg-white rounded-t-lg md:rounded-lg shadow">
                <!-- Modal header -->
  
                    <div class="flex justify-between items-center p-5 rounded-t border-b">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                            {{ $title }}
                        </h3>
                        <button x-on:click="show = false" class="text-gray-400 self-start bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-xs px-1.5 py-1  mr-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="small-modal">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="{{ $attributes->get('class') }}">
                        {{ $slot }}
                    </div>
                    <!-- Modal footer -->
                    {{ $footer }}
            </div>
        </div>
    </div>
</div>