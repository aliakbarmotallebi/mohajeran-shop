@extends('dashboard.layouts.base')
@section('title', 'مدیریت محصولات')
@section('content')

<x-dashboard.main title="مدیریت محصولات">
  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>
  <div class="flex items-center justify-between w-full border border-gray-100 px-10 bg-white rounded-xl mb-5">
    <form class="grid grid-cols-8 w-full py-5" method="GET">
      <div class="grid col-span-8 md:col-span-4 lg:col-span-3 xl:col-span-2">
        <div class="mr-4">
            <label class="block mb-2">
              گروه فرعی
            </label>
            <select name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
      <div class="grid col-span-8 md:col-span-4 lg:col-span-3 xl:col-span-2">
        <div class="mr-4 block mb-2">
            <label class="block mb-2">جستجو</label>
            <input name="search" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="نام ، بارکد" value="{{ request()->get('search') }}">
        </div>
      </div>
      <div class="grid col-span-8 md:col-span-4 lg:col-span-3 xl:col-span-2">
        <div class="mr-4">
          <label class="block mb-2">فیلتر</label>

          <select name="filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
      <div class="grid col-span-8 md:col-span-4 lg:col-span-3 xl:col-span-2 pt-4 md:pt-0">
          <div class="mr-auto self-end">
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">
                جستجو کن
              </button>
              <a href="{{ route('dashboard.products.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                  پاک
              </a>
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
  <div class="pt-20">
    {{ $products->appends(request()->query())->links('vendor.pagination.tailwind') }}
  </div>
</x-dashboard.main>


@endsection
@push('scripts')
<script  type="module">
document.addEventListener('DOMContentLoaded', function() {
  $('.categories').select2({
        placeholder: "انتخاب کنید",
        width: '100%',
    });
});
</script>
@endpush