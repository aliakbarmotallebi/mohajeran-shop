<div class="grid col-span-6 lg:col-span-6 md:col-span-12 rounded-md shadow-sm border border-gray-100 overflow-hidden">
    <div class="bg-white p-5 flex items-center border-b border-gray-200">
        <h2 class="font-medium text-base">
            هزینه پیک
        </h2>
    </div>
    <div class="p-5 bg-white">
        <div class="mt-3">
            <label class="inline-block mb-2">
                ویرایش حداقل مبلغ سفارش
                <span class="text-xs text-gray-400 mr-1">
                    تومان
                </span>
            </label>
            <input type="text" wire:model="min_amount" class="shadow-sm border @error('min_amount') border-theme-6 @enderror rounded-md py-2 px-3 w-full" placeholder="20000">
            @error('min_amount')
            <div class="text-theme-6 mt-2 text-xs">
                فیلد مبلغ سفارش الزامی می باشد
            </div>
            @enderror
        </div>

        <div class="mt-3">
            <label class="inline-block mb-2">
                شماره بارکد هزینه پیک
            </label>
            <input type="text" wire:model="code" class="shadow-sm border @error('code') border-theme-6 @enderror rounded-md py-2 px-3 w-full" placeholder="123147896512">
            @error('code')
            <div class="text-theme-6 mt-2 text-xs">
               {{  $message  }}
            </div>
            @enderror
        </div>

        <div class="border-r-2 border-theme-1 pr-4 mt-3">
            <div class="flex">
                <div class="ml-auto font-medium">
                    هزینه ارسال پیک
                    <span class="text-xs text-gray-400 mr-1">
                        تومان
                    </span>
                </div>
                <div class="text-gray-600">
                    {{ number_format( settings('PRICE_COURIER_COST') ) }}
                </div>
            </div>
            <div class="flex">
                <div class="ml-auto font-medium">حداقل مبلغ سفارش
                    <span class="text-xs text-gray-400 mr-1">
                        تومان
                    </span>
                </div>
                <div class="text-gray-600">{{ number_format( settings('MIN_ORDER_AMOUNT') ) }}</div>
            </div>
        </div>

        <button wire:click="handle" class="bg-theme-32 flex justify-center cursor-pointer border-theme-32 rounded-md border font-medium px-3 py-2 text-center transition-all duration-200 hover:opacity-90 hover:border-opacity-90 block w-40 mx-auto mt-5 hover:bg-theme-31
        focus:outline-2 focus:ring-4">
            <span wire:target="handle" wire:loading.class.add="hidden">
                بروزرسانی
            </span>
            <svg wire:target="handle" wire:loading.class.remove="hidden" class="animate-spin hidden" width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </button>
    </div>
</div>

