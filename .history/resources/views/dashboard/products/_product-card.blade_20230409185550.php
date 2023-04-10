<div class="xl:col-span-3 lg:col-span-3 md:col-span-6 sm:col-span-12 col-span-12 w-full bg-white rounded-lg shadow-lg relative overflow-hidden group cursor-pointer">
    <div class="w-full h-[300px]">
      @if( $product->hasImage() )
        <img src="{{ asset($product->getImage()) }}" class="w-full h-full object-scale-down" alt="" srcset="">
      @endif
    </div>
    <div class="bg-white">
        <h3 class="text-gray-900 py-3 px-[12px] border-t border-gray-200">
          {{ $product->name }}
          ({{ $product->fewtak }})
        </h3>
        <div class="py-3 px-4 text-xs flex justify-between text-gray-600 border-t border-gray-200">
            <div class="products__status">
              @if( $product->hasSupply() )
                <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                موجود در انبار
                </span>
                @else
                <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                عدم موجودی
                </span>
              @endif
            </div>
            <div class="products__price">
                <span>
                  {{ number_format($product->getPrice()) }}
                </span>
                ریال
                <div>
                  <del class="text-gray-300 mt-1">
                    {{ number_format($product->sell_price) }} تومان
                  </del>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-indigo-900/90 inset-0 w-full h-full absolute opacity-0 group-hover:opacity-100 transition-opacity delay-150">
        <div class="p-5 text-right w-full flex-col space-y-4">
            <div class="text-white text-sm">
                <div class="text-xs after:content-[':'] font-semibold">
                 بارکد محصول
                </div>
                {{ $product->code }} 
            </div>
            <div class="text-white text-sm">
                <div class="text-xs after:content-[':'] font-semibold">
                دسته بندی اصلی
               </div>
                <span class="text-white text-xs">
                  {{ $product->getMainGroupName() }}
                </span>
            </div>
            <div class="text-white text-sm">
              <div class="text-xs after:content-[':'] font-semibold">
                دسته بندی فرعی
              </div>
                <span class="text-white text-xs">
                  {{ $product->getSideGroupName() }}
                </span>
            </div>
        </div>
        <div class="bottom-4 absolute left-4">
                <div class="space-x-2 space-x-reverse">
                  @if(!$product->hasImage() )
                    <button class="text-white hover:opacity-40">
                        <label class="cursor-pointer">
                        <svg wire:target="photo" wire:loading.class="hidden" xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24" width="24" height="24"><path d="M20 3C20.5523 3 21 3.44772 21 4V5.757L19 7.757V5H5V13.1L9 9.1005L13.328 13.429L11.9132 14.8422L9 11.9289L5 15.928V19H15.533L16.2414 19.0012L17.57 17.671L18.8995 19H19V16.242L21 14.242V20C21 20.5523 20.5523 21 20 21H4C3.45 21 3 20.55 3 20V4C3 3.44772 3.44772 3 4 3H20ZM21.7782 7.80761L23.1924 9.22183L15.4142 17L13.9979 16.9979L14 15.5858L21.7782 7.80761ZM15.5 7C16.3284 7 17 7.67157 17 8.5C17 9.32843 16.3284 10 15.5 10C14.6716 10 14 9.32843 14 8.5C14 7.67157 14.6716 7 15.5 7Z"></path></svg>
                        <svg wire:target="photo" wire:loading.class.remove="hidden" class="hidden animate-spin h-5 w-5 text-white" wire:loading.class.remove="hidden"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <input type="file" wire:model="photo" class="hidden" />
                        </label>
                    </button>
                  @else
                    <button  wire:click="removeImage" class="text-white hover:opacity-40">
                        <svg wire:target="removeImage" wire:loading.class="hidden" class="fill-current" viewBox="0 0 24 24" width="24" height="24"><path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path></svg>
                        <svg wire:target="removeImage" wire:loading.class.remove="hidden" class="hidden animate-spin h-5 w-5 text-white" wire:loading.class.remove="hidden"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                  @endif
                  <button class="text-white hover:opacity-40">
                    <a href="{{ route('dashboard.products.edit', $product) }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24" width="24" height="24"><path d="M15.7279 9.57629L14.3137 8.16207L5 17.4758V18.89H6.41421L15.7279 9.57629ZM17.1421 8.16207L18.5563 6.74786L17.1421 5.33365L15.7279 6.74786L17.1421 8.16207ZM7.24264 20.89H3V16.6474L16.435 3.21233C16.8256 2.8218 17.4587 2.8218 17.8492 3.21233L20.6777 6.04075C21.0682 6.43128 21.0682 7.06444 20.6777 7.45497L7.24264 20.89Z"></path></svg>
                    </a>
                  </button>
            </div>
        </div>
    </div>
</div>