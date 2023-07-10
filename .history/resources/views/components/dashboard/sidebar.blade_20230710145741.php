<aside
    x-transition:enter="transition duration-200 transform ease-out"
    x-transition:enter-start="-transition-x-0"
    x-transition:leave="transition duration-100 transform ease-in"
    x-transition:leave-end="opacity-0 -transition-x-0"
    x-show="isOpen()"
    class="fixed xl:static inset-0 flex bg-white bg-opacity-90 z-40 h-screen flex-col max-w-xs w-full h-auto">
    <div x-show="!isOpen()" class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-50"></div>
    <div
        class="sidebar-header flex items-center bg-white p-5 bg-opacity-100 justify-center sticky top-0 h-[88px] px-[25px] space-x-3 space-x-reverse border-b border-gray-200">
        <a href="#" class="inline-flex flex-row items-center">
            <img src="{{ asset('icon.png') }}" alt="" class="w-10 h-10 rounded">
        </a>
        <div class="overflow-hidden text-ellipsis">
            <h3 class="whitespace-nowrap overflow-hidden text-sm font-bold">
                شهروند شاپ
            </h3>
            <p class="text-xs mt-1 font-semibold whitespace-nowrap text-ellipsis overflow-hidden text-right pl-1">
                <span class="after:content-[':'] after:px-1">
                    نام کاربری
                </span>
                {{ auth()->user()->name }}
            </p>
        </div>
        <i
        class="cursor-pointer lg:hidden hover:opacity-30"
        @click.prevent="handleClose()"
      >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"></path></svg>
        </i>
    </div>
    <div
        @click.away="handleAway()" 
        class="sidebar-content px-4 py-6 overflow-y-auto ">
        <ul class="flex flex-col w-full">
            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600 h-6 w-6">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.49a1 1 0 0 1 .386-.79l8-6.222a1 1 0 0 1 1.228 0l8 6.222a1 1 0 0 1 .386.79V20zm-2-1V9.978l-7-5.444-7 5.444V19h14z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        خانه
                    </span>
                </a>
            </li>
            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.products.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="group-hover:fill-blue-600"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M3 10H2V4.003C2 3.449 2.455 3 2.992 3h18.016A.99.99 0 0 1 22 4.003V10h-1v10.001a.996.996 0 0 1-.993.999H3.993A.996.996 0 0 1 3 20.001V10zm16 0H5v9h14v-9zM4 5v3h16V5H4zm5 7h6v2H9v-2z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        مدیریت کالا ها
                    </span>
                </a>
            </li>
            @if(auth()->user()->isAdmin())
            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.users.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600  w-6 h-6">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        لیست مشتریان
                    </span>
                    <span
                    class="flex items-center justify-center text-xs text-red-500 font-semibold bg-red-100 h-6 px-2 rounded-full mr-auto">
                {{ $user }}
                </span>
                </a>
            </li>
            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.orders.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600  h-6 w-6">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M4 6.414L.757 3.172l1.415-1.415L5.414 5h15.242a1 1 0 0 1 .958 1.287l-2.4 8a1 1 0 0 1-.958.713H6v2h11v2H5a1 1 0 0 1-1-1V6.414zM6 7v6h11.512l1.8-6H6zm-.5 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm12 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        سفارشات
                    </span>
                    <span
                        class="flex items-center justify-center text-xs text-red-500 font-semibold bg-red-100 h-6 px-2 rounded-full mr-auto">
                        {{ $order }}
                    </span>
                </a>
            </li>
            <li class="my-px h-[50px]">
                <a href="#"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600  h-6 w-6">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M15 2a4 4 0 0 1 3.464 6.001L23 8v2h-2v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V10H1V8l4.536.001A4 4 0 0 1 12 3.355 3.983 3.983 0 0 1 15 2zm-4 8H5v9h6v-9zm8 0h-6v9h6v-9zM9 4a2 2 0 0 0-.15 3.995L9 8h2V6a2 2 0 0 0-1.697-1.977l-.154-.018L9 4zm6 0a2 2 0 0 0-1.995 1.85L13 6v2h2a2 2 0 0 0 1.995-1.85L17 6a2 2 0 0 0-2-2z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        مدیریت قرعه کشی ها
                    </span>
                </a>
            </li>

            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.categories.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="group-hover:fill-blue-600 "
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M7 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 2a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm10.5 2a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm2.5 6v-.5a2.5 2.5 0 1 0-5 0v.5h-2v-.5a4.5 4.5 0 1 1 9 0v.5h-2zm-10 0v-4a3 3 0 0 0-6 0v4H2v-4a5 5 0 0 1 10 0v4h-2z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        دسته بندی
                    </span>
                </a>
            </li>
            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.pinned_products.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="group-hover:fill-blue-600 "
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M18 3v2h-1v6l2 3v2h-6v7h-2v-7H5v-2l2-3V5H6V3h12zM9 5v6.606L7.404 14h9.192L15 11.606V5H9z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        پین محصولات ویژه
                    </span>
                </a>
            </li>

            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.wallets.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600 " width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 8H4v8h16v-8zm0-2V5H4v4h16zm-6 6h4v2h-4v-2z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        تراکنش های کاربران
                    </span>
                </a>
            </li>

            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.payments.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600 " width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M11 2l7.298 2.28a1 1 0 0 1 .702.955V7h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1l-3.22.001c-.387.51-.857.96-1.4 1.33L11 22l-5.38-3.668A6 6 0 0 1 3 13.374V5.235a1 1 0 0 1 .702-.954L11 2zm0 2.094L5 5.97v7.404a4 4 0 0 0 1.558 3.169l.189.136L11 19.58 14.782 17H10a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h7V5.97l-6-1.876zM11 12v3h9v-3h-9zm0-2h9V9h-9v1z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        پرداختی درگاه بانکی
                    </span>
                </a>
            </li>

            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.settings.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600 " width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M5.33 3.271a3.5 3.5 0 0 1 4.254 4.963l10.709 10.71-1.414 1.414-10.71-10.71a3.502 3.502 0 0 1-4.962-4.255L5.444 7.63a1.5 1.5 0 1 0 2.121-2.121L5.329 3.27zm10.367 1.884l3.182-1.768 1.414 1.414-1.768 3.182-1.768.354-2.12 2.121-1.415-1.414 2.121-2.121.354-1.768zm-6.718 8.132l1.414 1.414-5.303 5.303a1 1 0 0 1-1.492-1.327l.078-.087 5.303-5.303z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        تنظیمات کل سیستم
                    </span>
                </a>
            </li>
            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.banners.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="group-hover:fill-blue-600 " width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M20 13c-1.678 0-3.249.46-4.593 1.259A14.984 14.984 0 0 1 18.147 19H20v-6zm-3.996 6C14.044 14.302 9.408 11 4 11v8h12.004zM4 9c3.83 0 7.323 1.435 9.974 3.796A10.949 10.949 0 0 1 20 11V3h1.008c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3H6V1h2v4H4v4zm14-8v4h-8V3h6V1h2zm-1.5 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                        </svg>
                    </span>
                    <span class="mr-3">
                        اسلاید های جدولی
                    </span>
                </a>
            </li>
            <li class="my-px h-[50px]">
                <a href="{{ route('dashboard.messages.index') }}"
                    class="flex flex-row items-center h-[50px] whitespace-nowrap px-3 py-4 rounded-lg text-[#32325D] hover:bg-gray-100 hover:text-blue-600 group">
                    <span class="flex items-center justify-center text-[#32325D] group-hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="group-hover:fill-blue-600 " width="24" height="24" viewBox="0 0 24 24"><path d="M14 22.5L11.2 19H6C5.44772 19 5 18.5523 5 18V7.10256C5 6.55028 5.44772 6.10256 6 6.10256H22C22.5523 6.10256 23 6.55028 23 7.10256V18C23 18.5523 22.5523 19 22 19H16.8L14 22.5ZM15.8387 17H21V8.10256H7V17H11.2H12.1613L14 19.2984L15.8387 17ZM2 2H19V4H3V15H1V3C1 2.44772 1.44772 2 2 2Z"></path></svg>
                    </span>
                    <span class="mr-3">
                        پیام های ارسالی کاربران
                    </span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
