@extends('dashboard.layouts.base')
@section('title')
    افزدون به تصاویر

@endsection

@section('content')

    <section class="cart mt-4 rounded-t-md rounded-xl border shadow-md bg-white">
        <div class="cart__title flex w-full items-center justify-between border-b p-5 pb-3">
            <span class="font-semibold">
                  افزدون به تصاویر
            </span>
        </div>
        <div class="cart__content overflow-x-auto whitespace-nowrap px-5 py-5">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('dashboard.banners.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-2" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                       موقعیت
                    </label>
                    <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>انتخاب کنید</option>
                        <option value="SECTION1">
                            SECTION1
                        </option>
                        <option value="SECTION2">
                            SECTION2
                        </option>
                        <option value="SECTION3">
                            SECTION3
                        </option>
                        <option value="SECTION4">
                            SECTION4
                        </option>
                        <option value="SECTION5">
                            SECTION5
                        </option>
                        <option value="SECTION6">
                            SECTION6
                        </option>
                        <option value="SECTION7">
                            SECTION7
                        </option>
                        <option value="SECTION8">
                            SECTION8
                        </option>
                        <option value="SECTION9">
                            SECTION9
                        </option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        لینک به دسته بندی
                    </label>
                    <select id="countries" name="side_group_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>انتخاب کنید</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->erp_code }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        بارگذاری عکس
                    </label>
                    <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
                <div class="col-span-2">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        ذخیره تغییرات
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
