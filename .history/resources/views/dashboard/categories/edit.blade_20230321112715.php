@extends('dashboard.layouts.base')
@section('title')
    ویرایش دسته بندی
    {{ $category->name }}
@endsection

@section('content')
    <section class="cart mt-4 rounded-t-md rounded-xl border shadow-md bg-white">
        <div class="cart__title flex w-full items-center justify-between border-b p-5 pb-3">
            <span class="font-semibold">
               ویرایش دسته بندی
                {{ $category->name }}
            </span>
        </div>
        <div class="cart__content overflow-x-auto whitespace-nowrap px-5 py-5">

            <form action="{{ route('dashboard.categories.update', $category) }}" class="grid grid-cols-1 md:grid-cols-2 gap-2" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        فروشنده شهروند
                    </label>
                    <select id="countries" name="vendor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>انتخاب کنید</option>
                        <option value="0" {{ ($category->is_vendor == 0)? "selected" : '' }}>
                            خیر
                        </option>
                        <option value="1" {{ ($category->is_vendor == 1)? "selected" : '' }}>
                            فروشنده شهروند
                        </option>

                    </select>
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        بارگذاری عکس
                    </label>
                    <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" >
                </div>

                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        ساعت کاری
                    </label>
                    <input name="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" value="{{ $category->time }}">
                </div>
                
                <div class="col-span-2">
                    @if($category->image)
                        <figure class="max-w-sm">
                            <img class="h-auto max-w-full rounded-lg" src="{{$category->image}}" alt="image">
                        </figure>
                    @endif
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    ذخیره تغییرات
                </button>
            </form>
        </div>
    </section>
@endsection