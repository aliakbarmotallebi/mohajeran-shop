@extends('dashboard.layouts.base')
@section('title', 'مدیریت محصولات')
@section('content')

<x-dashboard.main title="مدیریت محصولات">

  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>

  <div class="flex items-center justify-between w-full border border-gray-100 px-10 bg-white rounded-xl mb-5">
    <form class="grid grid-cols-12 w-full py-5" method="GET">
      <div class="grid col-span-3">
        <div class="mr-4">
            <label class="block mb-2">
              گروه فرعی
            </label>
            <select name="category" class="px-3 py-2 shadow rounded-md border w-full mt-2 sm:mt-0">
              <option value="">
                  دسته بندی را انتخاب کنید
              </option>
              @foreach($subcategories as $category)
                <option value="{{ $category->erp_code }}" {{ (request()->get('category') == $category->erp_code) ? "selected" : ""}}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
        </div>
      </div>
      <div class="grid col-span-3">
        <div class="mr-4 block mb-2">
            <label class="block mb-2">جستجو</label>
            <input name="search" type="text" class="px-3 py-2 shadow rounded-md border w-full sm:mt-0" placeholder="نام ، بارکد" value="{{ request()->get('search') }}">
        </div>
      </div>
      <div class="grid col-span-3">
        <div class="mr-4">
          <label class="block mb-2">فیلتر</label>

          <select name="filter" class="px-3 py-2 shadow rounded-md border w-full mt-2 sm:mt-0">
            <option value="">
                 فیلتر را انتخاب کنید
            </option>
            <option value="1" {{ (request()->get('filter') == 1) ? "selected" : ""}}>
              محصولات ویژه
            </option>
            <option value="2" {{ (request()->get('filter') == 2) ? "selected" : ""}}>
              بدون عکس
            </option>
                          <option value="3" {{ (request()->get('filter') == 3) ? "selected" : ""}}>
              بدون عکس
              و موجود
            </option>
          </select>
        </div>
      </div>
      <div class="grid col-span-3 pt-3">
        <div class="flex">
          <div class="mt-2 xl:mt-0 mr-auto">
              <button type="submit" class="bg-theme-1 text-white rounded-md inline-block border font-medium px-3 py-2 shadow-md mr-2 items-center justify-center transition-all duration-200 hover:opacity-90 hover:border-opacity-90">
                جستجو کن
              </button>
              <a href="{{ route('dashboard.products.index') }}" class="bg-theme-5 cursor-pointer text-gray-500 rounded-md inline-block border font-medium px-3 py-2 shadow-md mr-2 items-center justify-center transition-all duration-200 hover:opacity-90 hover:border-opacity-90 w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1 text-center">
                      پاک
              </a>
          </div>
      </div>
      </div>
  </form>
  </div>

  <div class="grid grid-cols-12 gap-2">
      @foreach($products as $product)
        <div class="xl:col-span-3 lg:col-span-3 md:col-span-6 sm:col-span-12 col-span-12 w-full bg-white rounded-lg shadow-lg relative overflow-hidden group cursor-pointer">
            <div class="w-full h-[300px]">
              <img src="{{ asset($product->image) }}" alt="" srcset="">
            </div>
            <div class="bg-white">
                <h3 class="text-gray-900 py-3 px-[12px] border-t border-gray-200">
                  {{ $product->name }}
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
                    </div>
                </div>
            </div>
            <div class="bg-indigo-900/90 inset-0 w-full h-full absolute opacity-0 group-hover:opacity-100 transition-opacity delay-150">
                <div class="p-5 flex items-center w-full flex-col">
                    <div class="text-white text-sm">
                        <div class="text-xs after:content-[':']">
                         بارکد محصول
                        </div>
                        {{ $product->code }} 
                    </div>
                    <div>
                        <div class="text-xs after:content-[':']">
                        دسته بندی
                       </div>
                        <span class="text-white text-xs">
                          {{ $product->getMainGroupName() }}
                        </span>
                        (<span class="text-white text-xs">
                          {{ $product->getSideGroupName() }}
                        </span>)
                    </div>
                </div>
                <div class="bottom-4 absolute left-4">
                        <div class="space-x-2 space-x-reverse">
                          @livewire('image-upload', [
                              'product' => $product
                          ])
                        <button class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 15v3h3v2h-3v3h-2v-3h-3v-2h3v-3h2zm.008-12c.548 0 .992.445.992.993V13h-2V5H4v13.999L14 9l3 3v2.829l-3-3L6.827 19H14v2H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016zM8 7a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/></svg>
                        </button>
                        <button class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-4.586 6l1.768 1.768-1.414 1.414L12 15.414l-1.768 1.768-1.414-1.414L10.586 14l-1.768-1.768 1.414-1.414L12 12.586l1.768-1.768 1.414 1.414L13.414 14zM9 4v2h6V4H9z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      @endforeach
      <div class="pt-32">
        {{ $products->appends(request()->query())->links('vendor.pagination.tailwind') }}
    </div>
  </div>


</x-dashboard.main>
@endsection
