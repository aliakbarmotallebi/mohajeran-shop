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
        @livewire('product-card', [
          'product' => $product
        ])
      @endforeach
  </div>
  <div class="pt-32">
    {{ $products->appends(request()->query())->links('vendor.pagination.tailwind') }}
  </div>
</x-dashboard.main>
@endsection
