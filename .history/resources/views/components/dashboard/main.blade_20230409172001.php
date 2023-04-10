@props([
    'header' => NULL,
    'append' => NULL,
])
{{  dd($title) }}
<main class="main flex flex-col flex-grow -ml-64 md:ml-0 transition-all duration-150 ease-in" 
    {{ $attributes->get('class') }}>    
    <header class="bg-white">
        <div {{ $header->attributes->class([
            "flex items-center h-[87px] px-10"
            ]) }}>
            <div class="font-medium text-xl flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 inline-flex w-6 h-6 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                {{ $title }}
            </div>
            {{ $header }}
        </div>
        {{ $append }}
    </header>
    
    <div class="main-content flex flex-col flex-grow p-4">
        {{ $slot }}
    </div>
  </main>