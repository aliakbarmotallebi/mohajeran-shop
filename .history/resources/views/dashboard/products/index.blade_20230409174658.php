@extends('dashboard.layouts.base')
@section('title', 'مدیریت محصولات')
@section('content')

<x-dashboard.main title="مدیریت محصولات">

  <x-slot name="header">
      <a href="{{ route('dashboard.pinneds.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 fill-white" ><path fill="none" d="M0 0h24v24H0z"/><path d="M18 3v2h-1v6l2 3v2h-6v7h-2v-7H5v-2l2-3V5H6V3h12zM9 5v6.606L7.404 14h9.192L15 11.606V5H9z"/></svg>
          پین محصولات ویژه
      </a>
  </x-slot>

  <x-slot name="append">
      <div class="px-[40px] flex items-center justify-between w-full h-[65px] border-t border-gray-100 px-10">
          <div 
              class="flex items-center flex-1 text-left">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/></svg>
              <input type="text" x-model="input" class="h-[64px] w-full outline-none bg-transparent px-4" placeholder="نام کالا خودرا وارد کنید">
          </div>       
          <div class="before:w-[1px] flex-1 before:h-[24px] before:bg-gray-300 w-full">
              <label 
                  class="cursor-pointer relative w-full rounded-md  text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  <svg xmlns="http://www.w3.org/2000/svg" class="inline" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M6.17 18a3.001 3.001 0 0 1 5.66 0H22v2H11.83a3.001 3.001 0 0 1-5.66 0H2v-2h4.17zm6-7a3.001 3.001 0 0 1 5.66 0H22v2h-4.17a3.001 3.001 0 0 1-5.66 0H2v-2h10.17zm-6-7a3.001 3.001 0 0 1 5.66 0H22v2H11.83a3.001 3.001 0 0 1-5.66 0H2V4h4.17zM9 6a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm6 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-6 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
                  <input type="text" x-model="input" class="outline-none bg-transparent px-4 py-3" placeholder="انتخاب شهر">
              </label>
          </div>
          <div class="flex-1 w-full">
              <label 
              class="cursor-pointer relative rounded-md  text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="inline" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path d="M21 4v2h-1l-5 7.5V22H9v-8.5L4 6H3V4h18zM6.404 6L11 12.894V20h2v-7.106L17.596 6H6.404z"/></svg>
              <input type="text" x-model="input" class="w-full outline-none bg-transparent px-4 py-3" placeholder="انتخاب شهر">
              </label>
          </div>
      </div>
  </x-slot>


  <div class="grid grid-cols-12 gap-2">
      @foreach($products as $product)
          <div class="col-span-3 w-full bg-white rounded-lg shadow-lg">
              <div class="w-full h-[300px]">
                  <img src="{{ asset($product->image) }}" alt="" srcset="">
                  @livewire('image-upload', [
                      'product' => $product
                  ])
              </div>
              <div class="">
                  <h3 class="text-gray-900 h-[48px] px-[12px] border-t border-gray-200">
                      {{ $product->name }}
                  </h3>
                  <div class="h-[40px] px-[12px] text-xs flex justify-between text-gray-600 border-t border-gray-200">
                      <div class="products__sold-count-wrapper___2OGAG">

                      </div>
                      <div class="products__price-wrapper___12nA4">
                          <em>
                              {{ number_format($product->getPrice()) }}
                          </em>
                          <em class="products__price-currency___3gYLL">تومان</em>
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
