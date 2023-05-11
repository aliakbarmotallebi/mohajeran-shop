@props([
    'header' => NULL,
    'append' => NULL,
])

<main class="main w-full flex flex-col -ml-64 md:ml-0 transition-all duration-150 ease-in" 
    {{ $attributes->get('class') }}>    
    <header class="bg-white">
        <div {{ $header->attributes->class([
            "flex items-center h-[87px] px-10"
            ]) }}>
            <div
                x-cloak
                x-show="!isOpen()" 
                class="flex ml-auto ml-2">
                <button
                    x-show="!isOpen()"
                    @click.prevent="handleOpen()"
                    class="p-3 text-slate-700 transition-color delay-150 hover:text-blue-700 bg-slate-100 rounded-lg hover:bg-blue-100"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path></svg>
                </button>
            </div>
            <div class="hidden md:block font-medium text-xl flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 inline-flex w-6 h-6 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                {{ $title }}
            </div>
            <div class="mr-auto">
            {{ $header }}
            </div>
        </div>
        {{ $append }}
    </header>
    
    <div class="main-content flex flex-col p-4">
        {{ $slot }}
    </div>
  </main>