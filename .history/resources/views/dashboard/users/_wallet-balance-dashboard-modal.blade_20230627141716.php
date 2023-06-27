<x-partial.modal title="افزایش و کسر از اعتبار حساب کاربری" wire:model="show">
    <section class="w-full">
        <div x-data="{price:''}"  class="mb-2" >
            <label class="@error('amount') error-label @enderror  block pb-2 text-sm font-medium ">
                مبلغ به ریال
                <span class="inline-flex bg-red-500 w-1 h-1 rounded-full"></span>
            </label>
            <input type="number" x-model.number="price" wire:model="amount" class="@error('amount') error-input @enderror shadow-sm bg-white border  text-sm rounded-lg block w-full p-2.5
                ">
            <span x-show="price" x-text="((price > 0) ? price.num2persian() : '') + ' ریال'" class="text-xs text-green-700 font-semibold">
            </span>
            @error('amount')
                <p class="mt-1 text-xs text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-2">
            <div>                       
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    متن پیام مدیر
                </label>
                <textarea id="description" wire:model="message" rows="4" 
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
        </div>
       
        <div class="mb-2">
            <label class="font-medium inline-block mb-3 text-sm uppercase">
                نوع عملیات
                <span class="inline-flex bg-red-500 w-1 h-1 rounded-full"></span>
            </label>
            <div class="grid grid-cols-3 gap-2 ">
                <label class="relative">
                    <input type="radio" value="TYPE_DEPOSIT" wire:model="type" class="hidden peer"/>
                    <svg xmlns="http://www.w3.org/2000/svg" class="z-10 peer-checked:opacity-100 opacity-0 absolute top-1 left-1" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-.997-6l7.07-7.071-1.414-1.414-5.656 5.657-2.829-2.829-1.414 1.414L11.003 16z"/></svg>
                    <div for="box-2" class="border-gray-200 border-2 peer-checked:border-blue-500 rounded-lg cursor-pointer px-2 py-4">
                        <span class="text-xs">
                        واریز به حساب
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-auto fill-green-600 inline ml-2" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 16.172l5.364-5.364 1.414 1.414L12 20l-7.778-7.778 1.414-1.414L11 16.172V4h2v12.172z"/></svg>
                    </div>
                </label>
        

                <label class="relative">
                    <input type="radio" value="TYPE_WITHDRAW" wire:model="type" class="hidden peer"/>
                    <svg xmlns="http://www.w3.org/2000/svg" class="z-10 peer-checked:opacity-100 opacity-0 absolute top-1 left-1" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-.997-6l7.07-7.071-1.414-1.414-5.656 5.657-2.829-2.829-1.414 1.414L11.003 16z"/></svg>
                    <div for="box-1" class="border-gray-200 border-2 peer-checked:border-blue-500 rounded-lg cursor-pointer px-2 py-4">
                        <span class="text-xs">
                        برداشت از حساب
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-auto fill-red-600 inline ml-2" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"/></svg>
                    </div>
                </label>
          
            </div>
            @error('type')
                <p class="mt-1 text-xs text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
            
        </div>
    </section>
    <x-slot name="footer">
        <div class="flex items-center space-x-reverse px-2 py-3 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
            <button wire:click="save" type="button" class="text-white bg-[#1da1f2] hover:opacity-60 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                انجام عملیات
            </button>
            <button wire:click="show()" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                انصراف
            </button>
        </div>
    </x-slot>
</x-partial.modal>