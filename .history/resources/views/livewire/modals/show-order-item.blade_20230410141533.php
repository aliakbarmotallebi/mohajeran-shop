<x-partial.modal title="افزایش و کسر از اعتبار حساب کاربری" wire:model="show">
    <div class="p-4">
        <div style="padding:10px; margin: 20px">
            <span>
                آدرس:
            </span>
            <span class="font-bold text-gray-500">
     
           </span>
        </div>   
       <div class="order--items-wrapper">
           <div class="order--items__header grid grid-cols-12">
             <div class="col-span-1 text-center">
               <span class="font-bold text-gray-500">#</span>
             </div>
               <div class="col-span-2 text-center">
                 <span class="font-bold text-gray-500">نام کالا</span>
               </div>
               <div class="col-span-2 text-center">
                 <span class="font-bold text-gray-500">
                   بارکد محصول
                 </span>
               </div>
               <div class="col-span-2 text-center">
                 <span class="font-bold text-gray-500">قیمت کل</span>
               </div>
               <div class="col-span-2 text-center">
                 <span class="font-bold text-gray-500">قیمت واحد</span>
               </div>
               <div class="col-span-1 text-center">
                 <span class="font-bold text-gray-500">تعداد</span>
               </div>
               <div class="col-span-2 text-center">
                 <span class="font-bold text-gray-500">توضیحات</span>
               </div>
               <div class="col-span-2 text-center">
                 <span class="font-bold text-gray-500">عملیات</span>
               </div>
           </div>
           <div class="mt-2">
             @foreach ($order->items as $item)
             <div
                 wire:target="remove({{ $item->id }})"
                 wire:loading.class="opacity-50"
                 class="order--items__content grid grid-cols-12 mt-3 items-center border p-2 rounded">
               <div class="col-span-1 text-center">
                 <span class="font-bold text-gray-500">
                   {{  $item->id }}
                 </span>
               </div>
               <div class="col-span-2 items-center text-center text-ellipsis">
                 <span class="font-bold text-gray-800">
                   {{ $item->product->name ?? null }}
                 </span>
               </div>
               <div class="col-span-2 items-center text-center text-ellipsis">
                 <span class="font-blod text-blue-800 underline">
                   {{ $item->product->code ?? null }}
                 </span>
               </div>
               <div class="col-span-2 items-center text-center">
                 <span class="font-bold text-gray-800">
                   {{ ($item->getPrice() * $item->getQuantity()) }}
                 </span>
                 تومان
               </div>
               <div class="col-span-2 items-center text-center">
                 <span class="font-bold text-gray-800">
                   {{ $item->getPrice() }}
                 </span>
                 تومان
               </div>
               <div class="col-span-1 items-center text-center">
                 <span class="font-bold text-gray-800">
                   {{ $item->getQuantity() }}
                 </span>
               </div>
               <div class="col-span-2 items-center text-center">
                 <span class="font-bold text-gray-800">
                   {{ $item->comment }}
                 </span>
               </div>
               <div class="col-span-2 items-end text-center">
                 @if( !$order->isCompleted() )
                 <button wire:click="remove({{ $item->id }})" class="p-2 mr-2 text-sm font-bold text-red-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                   <svg
                     wire:loading
                     wire:target="remove({{ $item->id }})"
                     class="animate-spin w-4 h-4 m-auto inset-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                     <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                     <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                   </svg>
                   <svg
                     wire:loading.class="hidden"
                     wire:target="remove({{ $item->id }})"
                     xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 m-auto inset-0"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                   >
                     <polyline points="3 6 5 6 21 6" />
                     <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                     <line x1="10" y1="11" x2="10" y2="17" />
                     <line x1="14" y1="11" x2="14" y2="17" />
                   </svg>
                 </button>
                 @endif
               </div>
             </div>
             @endforeach
             </div>
       </div>
     </div>
    <x-slot name="footer"></x-slot>
</x-partial.modal>
