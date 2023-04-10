@extends('dashboard.layouts.base')
@section('title', 'مدیریت محصولات')
@section('content')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium ml-auto">
      لیست محصولات
  </h2>
</div>
<div class="rounded-md shadow-md mt-5 p-5 pb-0 bg-white">


  <div class="w-full pb-8">
    <form class="grid grid-cols-12 w-full" method="GET">
        <div class="grid col-span-4">
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
        <div class="grid col-span-4">
          <div class="mr-4 block mb-2">
              <label class="block mb-2">جستجو</label>
              <input name="search" type="text" class="px-3 py-2 shadow rounded-md border w-full sm:mt-0" placeholder="نام ، بارکد" value="{{ request()->get('search') }}">
          </div>
        </div>
        <div class="grid col-span-4">
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
        <div class="grid col-span-12 pt-3">
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

  <div class="pt-4 pb-4 relative">
    @if($products->isEmpty())
    <div class="flex justify-center">
        <div class="flex flex-col py-10 opacity-40">
            <div class="self-center">
                <svg class="w-28 h-28" viewBox="0 0 64 41" xmlns="http://www.w3.org/2000/svg">
                    <g transform="translate(0 1)" fill="none" fill-rule="evenodd">
                    <ellipse class="bg-gray-100" cx="32" cy="33" rx="32" ry="7"></ellipse>
                    <g class="stroke-gray-700" fill-rule="nonzero"><path d="M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z"></path><path d="M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z" class="ant-empty-img-simple-path"></path></g></g></svg>
            </div>
            <div class="text-gray-900 text-lg ">داده‌ای موجود نیست</div>
        </div>
    </div>

    @else
    <div class="flex flex-wrap -m-4">
        @foreach($products as $product)
           <livewire:image-upload :product="$product" />
           @endforeach
    </div>

    <div class="pt-32">
        {{ $products->appends(request()->query())->links('vendor.pagination.tailwind') }}
    </div>
    @endif
  </div>

</div>

@endsection
