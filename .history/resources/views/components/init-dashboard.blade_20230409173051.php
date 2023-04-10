<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y rounded-md ">
        <div class="relative before:rounded-md before:ml-auto before:mr-auto before:w-11/12 before:right-0 before:left-0 before:mt-3 before:bg-[#f9fafc] before:shadow-sm before:absolute before:h-full
        cursor-pointer transform scale-100 transition-all duration-300 hover:shadow-lg hover:scale-105">
            <div class="bg-white shadow-sm rounded-md relative p-5 flex items-center text-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-20 h-20 fill-sky-500"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM17.3628 15.2332C20.4482 16.0217 22.7679 18.7235 22.9836 22H20C20 19.3902 19.0002 17.0139 17.3628 15.2332ZM15.3401 12.9569C16.9728 11.4922 18 9.36607 18 7C18 5.58266 17.6314 4.25141 16.9849 3.09687C19.2753 3.55397 21 5.57465 21 8C21 10.7625 18.7625 13 16 13C15.7763 13 15.556 12.9853 15.3401 12.9569Z"></path></svg>
                <div class="mr-auto">
                    <div class="text-3xl font-bold leading-8 mt-6">{{ $users }}</div>
                    <div class="text-base mt-1">
                        تعداد کل مشتریان
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y rounded-md">
        <div class="relative before:rounded-md before:ml-auto before:mr-auto before:w-11/12 before:right-0 before:left-0 before:mt-3 before:bg-[#f9fafc] before:shadow-sm before:absolute before:h-full
        cursor-pointer transform scale-100 transition-all duration-300 hover:shadow-lg hover:scale-105">
            <div class="bg-white shadow-sm rounded-md relative p-5">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6">{{ $products }}</div>
                <div class="text-base mt-1">
                    تعداد کل کالاها
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y rounded-md">
        <div class="relative before:rounded-md before:ml-auto before:mr-auto before:w-11/12 before:right-0 before:left-0 before:mt-3 before:bg-[#f9fafc] before:shadow-sm before:absolute before:h-full
        cursor-pointer transform scale-100 transition-all duration-300 hover:shadow-lg hover:scale-105">
            <div class="bg-white shadow-sm rounded-md relative p-5">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6">NULL</div>
                <div class="text-base mt-1">
                    مجموع سفارت
                </div>
            </div>
        </div>
    </div>
</div>

