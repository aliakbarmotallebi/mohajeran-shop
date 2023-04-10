
<div class="flex-grow flex px-6 py-6 text-grey-100 items-center border-b">
  <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
      <div class="rounded-full bg-gray-100 pl-4 inline-flex items-center">
          <span 
              class="bg-slate-300 inline-block h-12 w-12 rounded-full text-2xl uppercase text-white text-center align-middle leading-loose">
              {{ $user->id }}
          </span>
          <span class="text-lg mr-2 uppercase">
            {{ $user->name }}
          </span>
      </div>
  </div>
  <div class="px-4">
      <div class="text-right">
          <span class="text-gray-400 text-xs block">
          نام و نام خانوادگی
          </span>
          {{ user.name ?? 'بدون نام'}}
      </div>
  </div>
  <div class="px-4">
      <div class="text-right">
          <span class="text-gray-400 text-xs block">
          تلفن همراه
          </span>
          {{ user.mobile }}
      </div>
  </div>
  <div class="px-4">
      <div class="text-right">
          <span class="text-gray-400 text-xs block">
          آدرس
          </span>
          {{ user.address ?? 'بدون آدرس' }}
      </div>
  </div>
  <div class="flex text-center gap-x-1 mr-auto ml-3">
      <button 
          class="flex items-center p-2 text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
          <div class="font-medium">
              400
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 fill-current text-yellow-400" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928L12 18.26zm0-2.292l4.247 2.377-.949-4.773 3.573-3.305-4.833-.573L12 5.275l-2.038 4.42-4.833.572 3.573 3.305-.949 4.773L12 15.968z"/></svg>
      </button>
      <button 
          class="flex items-center p-2 text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
          <div class="font-medium">
              {{ 100000|number_format }}
              <span class="text-xs text-gray-400">
                 (تومان)
              </span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 fill-current" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M18 7h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h15v4zM4 9v10h16V9H4zm0-4v2h12V5H4zm11 8h3v2h-3v-2z"/></svg>
      </button>
      {% if user.isEmptyErpCode() %}
          <button 
              class="flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
              <svg
                  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="5 3 19 12 5 21 5 3" />
              </svg>
          </button>
      {% endif %}
  </div>
</div>
  {{ $users->links('pagination') }}
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


