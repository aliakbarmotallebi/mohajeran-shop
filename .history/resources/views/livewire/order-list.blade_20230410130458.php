<x-dashboard.card title="لیست سفارشات">
  <div class="flex-grow flex px-6 py-6 text-grey-100 items-center border-b">
    <div class="px-4">
        <span class="text-gray-400 text-xs block">
            شماره سفارش
        </span>
        5382
    </div>
    <div class="px-4">
        <div class="text-right">
            <span class="text-gray-400 text-xs block">
            نام کاربر سفارش دهنده
            </span>
            اسماعیل جوزی دلفان
        </div>
    </div>
    <div class="px-4">
        <div class="text-right">
            <span class="text-gray-400 text-xs block">
            تلفن همراه
            </span>
            09306193414
        </div>
    </div>
    <div class="w-2/5 xl:w-1/4  px-4">
        <div class="text-right">
            <span class="text-gray-400 text-xs block">
            آدرس
            </span>
            بدون آدرس
        </div>
    </div>
    <div class="px-4">
        <div class="text-right">
            <span class="text-gray-400 text-xs block">
            مبلغ کل سفارش
            </span>
            {{ 1020100 }}
            ریال
        </div>
    </div>
    <div class="px-4">
        <div class="text-right">
            <span class="text-gray-400 text-xs block">
            وضعیت سفارش
            </span>
           
                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                ارسال به سرور
                </span>
            
                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                مشکل در ارسال
                </span>
            
        </div>
    </div>
    <div class="flex text-center mr-auto ml-3">
        <button 
            class="mr-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
            <svg
                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polygon points="5 3 19 12 5 21 5 3" />
            </svg>
        </button>
        <button 
            class="mr-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15zm-3.847-8.699a2 2 0 1 0 2.646 2.646 4 4 0 1 1-2.646-2.646z"/></svg>
        </button>
    </div>
</div>
</x-dashboard.card>

<div class="pt-10">
{{ $orders->links('vendor.pagination.tailwind') }}
</div>


