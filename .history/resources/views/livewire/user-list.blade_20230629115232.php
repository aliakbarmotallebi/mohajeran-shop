<x-dashboard.card title="لیست مشتریان">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 gap-y-4 m:gap-y-0 px-6 py-5 border-b">
        <div>
            <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">
                نام و نام خانوادگی
            </label>
            <input type="text" wire:model="fullname" name="fullname"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="بهنام اکبری">
        </div>
        <div>
            <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900">
                شماره همراه
            </label>
            <input type="text" wire:model="mobile" name="mobile"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="09121234567">
        </div>
        <div>
            <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900">
                وضعیت ارسال به سرور
            </label>
            <select wire:model="status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>انتخاب کنید</option>
                <option value="0">
                    ارسال شده
                </option>
                <option value="1">
                    ارسال نشده
                </option>
            </select>
        </div>
    </div>
    @foreach ($users as $user)
        <div
            class="grid grid-cols-1 gap-6 md:grid-cols-5 lg:grid-cols-3 gap-y-4 m:gap-y-0 px-6 py-6 text-grey-100 justify-between items-center border-b space-x-3 w-full">
            <div class="px-4 whitespace-nowrap flex items-center max-w-xs w-full">
                <div class="rounded-full bg-gray-100  inline-flex items-center group">
                    <div
                        class="items-center text-xl bg-slate-800 inline-block h-12 w-12 rounded-full uppercase text-white text-center align-middle leading-loose">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-7 h-7 inline" fill="none"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 11.25a3.744 3.744 0 0 1-3.733-3.733h-1.5A5.244 5.244 0 0 0 12 12.75v-1.5ZM8.267 7.517C8.267 5.456 9.954 3.75 12 3.75v-1.5c-2.888 0-5.233 2.392-5.233 5.267h1.5ZM12 3.75a3.744 3.744 0 0 1 3.733 3.733h1.5A5.244 5.244 0 0 0 12 2.25v1.5Zm3.733 3.733c0 2.061-1.687 3.767-3.733 3.767v1.5c2.888 0 5.233-2.392 5.233-5.267h-1.5ZM19 20.25H5v1.5h14v-1.5Zm-14 0a.253.253 0 0 1-.25-.25h-1.5c0 .964.786 1.75 1.75 1.75v-1.5ZM4.75 20v-1h-1.5v1h1.5Zm0-1A3.262 3.262 0 0 1 8 15.75v-1.5A4.762 4.762 0 0 0 3.25 19h1.5ZM8 15.75h8v-1.5H8v1.5Zm8 0A3.262 3.262 0 0 1 19.25 19h1.5A4.762 4.762 0 0 0 16 14.25v1.5ZM19.25 19v1h1.5v-1h-1.5Zm0 1c0 .136-.114.25-.25.25v1.5c.964 0 1.75-.786 1.75-1.75h-1.5Z" />
                        </svg>
                    </div>
                    @if ($user->name)
                        <span class="text-lg uppercase truncate transition-all duration-200 overflow-hidden px-1 pl-3">
                            {{ $user->name }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="px-4 whitespace-nowrap">
                <div class="text-right">
                    <span class="text-gray-400 text-xs block">
                        تلفن همراه
                    </span>
                    {{ $user->mobile }}
                </div>
            </div>
            <div class="px-4 whitespace-nowrap relative">
                <div class="inline-flex rounded-md" role="group">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                      Profile
                    </button>
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                      Messages
                    </button>
                  </div>
            </div>
            <div class="px-4 whitespace-nowrap relative">
                <div class="text-right w-52 truncate">
                    <span class="text-gray-400 text-xs block">
                        آدرس
                    </span>
                    <div class="group cursor-pointer inline-block border-b border-gray-400 text-center">
                        {{ $user->getAddressLimit() ?? 'بدون آدرس' }}
                        <div
                            class="opacity-0 bg-black text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full ml-14 px-3 pointer-events-none">
                            {{ $user->address ?? 'بدون آدرس' }}
                            <svg class="absolute text-black h-2 w-full right-0 top-full" x="0px"
                                y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex text-center gap-x-1 mr-auto justify-self-end">
                <button
                    class="flex items-center text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                    <div class=" px-2 h-full border-l ml-1 bg-yellow-100 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-yellow-700 h-full"
                            viewBox="0 0 24 24" width="20" height="20">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928L12 18.26zm0-2.292l4.247 2.377-.949-4.773 3.573-3.305-4.833-.573L12 5.275l-2.038 4.42-4.833.572 3.573 3.305-.949 4.773L12 15.968z" />
                        </svg>
                    </div>
                    <div class="font-medium text-xs p-2">
                        {{ $user->score }}
                    </div>
                </button>
                <button x-data="{}"
                    x-on:click="window.livewire.emitTo('modals.wallet-balance-dashboard', 'show', {{ $user->id }})"
                    class="flex items-center text-gray-700 bg-white rounded-lg border group border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                    <div class=" px-2 h-full border-l ml-1 bg-slate-100 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current h-full" viewBox="0 0 24 24"
                            width="20" height="20">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M18 7h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h15v4zM4 9v10h16V9H4zm0-4v2h12V5H4zm11 8h3v2h-3v-2z" />
                        </svg>
                    </div>
                    <div class="font-medium text-xs whitespace-nowrap px-2 w-full">
                        {{ number_format($user->balance()) }}
                        <span class="text-gray-400 group-hover:text-blue-700 ">
                            (تومان)
                        </span>
                    </div>
                </button>
                @if ($user->isEmptyErpCode())
                    <button wire:click="exec({{ $user->id }})"
                        class="p-2 mr-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <svg wire:loading wire:target="exec({{ $user->id }})"
                            class="animate-spin w-4 h-4 m-auto inset-0" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <svg wire:loading.class="hidden" wire:target="exec({{ $user->id }})"
                            xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 m-auto inset-0" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polygon points="5 3 19 12 5 21 5 3" />
                        </svg>
                    </button>
                @endif

            </div>
        </div>
    @endforeach
    @livewire('modals.wallet-balance-dashboard')
</x-dashboard.card>
<div class="pt-20">
    {{ $users->appends(request()->query())->links('vendor.pagination.tailwind') }}
</div>
