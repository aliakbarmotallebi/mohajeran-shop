
<div class="rounded-md shadow-md bg-white mt-5">
    <div class="p-5 flex flex-col-reverse sm:flex-row text-gray-600 border-b border-gray-200 dark:border-dark-1">
        {{ $users->links('pagination') }}
    </div>
    <div class="overflow-x-auto sm:overflow-x-visible">
        <div class="intro-y">
          @foreach ($users as $user)
          <div class="cursor-pointer bg-white transition-all duration-200 hover:scale-[1.02] hover:rounded-sm hover:shadow-md hover:relative hover:z-20 inline-block sm:block text-gray-700 dark:text-gray-500 dark:bg-dark-1 border-b dark:border-dark-1">
            <div class="flex px-5 py-3">
              <div class="w-72 flex-none flex items-center mr-5">
                @if($user->isBlocked())
                <a href="javascript:;" class="w-5 h-5 flex-none ml-4 flex items-center justify-center text-red-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock block mx-auto"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                </a>
                @else
                <a href="javascript:;" class="w-5 h-5 flex-none ml-4 flex items-center justify-center text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-unlock block mx-auto"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 9.9-1"></path></svg>                </a>
                @endif
                <div class="w-6 h-6 flex-none image-fit relative ml-5">
                  <img class="rounded-full" src="{{ asset('images/192ef088e151470e4475dc310461ad6f.png') }}">
                </div>
                <div class="truncate ml-3">
                    {{ $user->name }}
                </div>
              </div>
              <div class="truncate ml-3" style="direction: ltr;">
                {{ $user->mobile }}
              </div>
              <div class="w-64 sm:w-auto truncate">
                {{ $user->address ?? 'بدون آدرس' }}
              </div>
              <div class="w-auto mr-auto">
                @if( $user->isEmptyErpCode() )
                <button wire:click="exec({{ $user->id }})" class="p-2 mr-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  <svg
                    wire:loading
                    wire:target="exec({{ $user->id }})"
                    class="animate-spin w-4 h-4 m-auto inset-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  <svg
                        wire:loading.class="hidden"
                        wire:target="exec({{ $user->id }})"
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-4 h-4 m-auto inset-0"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <polygon points="5 3 19 12 5 21 5 3" />
                    </svg>
                  </button>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
