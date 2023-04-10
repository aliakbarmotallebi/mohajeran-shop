<div class="orders-wrapper bg-white rounded-lg border border-gray-200">
  <div class="orders__header grid grid-cols-12 pt-5 pb-3 rounded-t-lg bg-gray-100 border border-gray-300 font-bold sticky top-0 px-2">
    <div class="col-span-1 text-right">
      <span class="font-semibold text-sm">
        شماره سفارش
      </span>
    </div>
    <div class="col-span-1 text-center">
      <span class="font-semibold text-sm">
        نام کاربر سفارش دهنده
      </span>
    </div>
    <div class="col-span-1 text-center">
      <span class="font-semibold text-sm">
        تلفن همراه
      </span>
    </div>
    <div class="col-span-1 text-center">
      <span class="font-semibold text-sm">
        تاریخ سفارش
      </span>
    </div>
    <div class="col-span-2 text-center">
      <span class="font-semibold text-sm">
        جمع کل فاکتور
      </span>
    </div>
    <div class="col-span-3 text-center">
      <span class="font-semibold text-sm">
        وضعیت
      </span>
    </div>
    <div class="col-span-3 text-center">
      <span class="font-semibold text-sm">
        عملیات
      </span>
    </div>
  </div>
  <div class="orders__list">
      @foreach($orders as $order)
        <div class="orders__list__item overflow-x-auto rounded-b-lg transition-all duration-200 hover:bg-gray-100 sm:overflow-x-visible bg-gradient-to-r bg-white border-b-2 border-gray-200 p-3">
          <div x-data="{ collapse : false }">
            <div class="grid grid-cols-12 items-center text-gray-700">
              <div class="col-span-1 font-bold text-right text-gray-500 {{  $order->isPending() ? 'line-through' : ''  }}">
                  <span>#{{ $order->id }}</span>
                    @if( $order->shipping_method == "2")
                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 whitespace-nowrap">
                        ارسال فوری
                    </span>
                  @endif
              </div>
              <div class="col-span-1 text-center">
                  <span>{{ $order->user->name ?? NULL }}</span>
              </div>
              <div class="col-span-1 text-center">
                <span>{{ $order->user->mobile  ?? NULL }}</span>
              </div>
              <div class="col-span-1 text-center">
                <span>{{ $order->getCreatedAt() }}</span>
              </div>
              <div class="col-span-2 text-center">
                <span>{{ number_format($order->getTotal()) }}</span>
                تومان
              </div>
              <div class="col-span-1 text-center">
                @if( $order->isCompleted() )
                <div class="border-green-700 border text-green-700 text-sm font-bold px-[7px] py-0 uppercase rounded text-center whitespace-nowrap">
                  <span class="block">
                    ارسال موفق
                  </span>
                </div>
                @elseif( $order->isPending() )
                <div class="border-red-700 border text-red-700 text-sm font-bold px-[7px] py-0 uppercase rounded text-center whitespace-nowrap">
                  <span class="block">

                    ارسال ناموفق
                  </span>
                </div>
                @endif
                 
              </div>
              <div class="col-span-1 text-center">
                @if( $order->is_cancelled )
                    <span class="mt-1 bg-red-100 text-red-700 text-sm font-bold mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 whitespace-nowrap">
                   انصراف از سفارش
                  </span>
                  @endif
              </div>
              <div class="col-span-1 text-center">
                @if( $order->is_suggest )
                    <span class="mt-1 bg-red-100 text-red-700 text-sm font-bold mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 whitespace-nowrap">
                   کالا مشابه فعال
                  </span>
                  @endif
              </div>
              <div class="col-span-3">
                <div class="flex items-center justify-end">
                  @if ( $order->isPending() && !$order->items->isEmpty() )
                  <button wire:click="exec({{ $order->id }})" class="p-2 mr-2 text-sm font-bold text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg
                      wire:loading
                      wire:target="exec({{ $order->id }})"
                      class="animate-spin w-4 h-4 m-auto inset-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <svg
                        wire:target="exec({{ $order->id }})"
                        wire:loading.class="hidden"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 m-auto inset-0"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <polygon points="5 3 19 12 5 21 5 3" />
                      </svg>
                    </button>
                  @endif
                  <a href="{{ route('dashboard.orders.show', $order) }}" 
                    target="_blank"
                    class="p-2 mr-2 text-sm font-bold text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>  
                  </a>
                  <button @click="collapse = !collapse "  class="p-2 mr-2 text-sm font-bold text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 m-auto inset-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                  </button>
                </div>
              </div>
            </div>
            <div x-show="collapse" :class="{ 'max-h-0 overflow-hidden': !collapse, 'h-auto overflow-auto': collapse}" class="bg-white transition-all duration-1000 p-4">
              <div class="p-4">
                 <div style="padding:10px; margin: 20px">
                     <span>
                         آدرس:
                     </span>
                     <span class="font-bold text-gray-500">
                         {{  $order->user->address }}
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
            </div>
          </div>
        </div>
      @endforeach
  </div>
</div>



<div class="pt-10">
{{ $orders->links('vendor.pagination.tailwind') }}
</div>


