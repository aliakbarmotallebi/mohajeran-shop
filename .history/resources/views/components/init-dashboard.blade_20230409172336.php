<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y rounded-md ">
        <div class="relative before:rounded-md before:ml-auto before:mr-auto before:w-11/12 before:right-0 before:left-0 before:mt-3 before:bg-[#f9fafc] before:shadow-sm before:absolute before:h-full
        cursor-pointer transform scale-100 transition-all duration-300 hover:shadow-lg hover:scale-105">
            <div class="bg-white shadow-sm rounded-md relative p-5">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <div class="text-3xl font-bold leading-8 mt-6">{{ $users }}</div>
                <div class="text-base text-gray-600 mt-1">
                    تعداد کل مشتریان
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
                <div class="text-base text-gray-600 mt-1">
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
                <div class="text-base text-gray-600 mt-1">
                    مجموع سفارت
                </div>
            </div>
        </div>
    </div>
</div>

