@extends('dashboard.layouts.base')
@section('title')
    افزدون به تصاویر
@endsection

@section('content')

<x-dashboard.main title="افزدون به تصاویر">
    <x-slot name="header"></x-slot>
    <x-slot name="append"></x-slot>
    <x-dashboard.card title="افزدون به تصاویر">
        <form action="{{ route('dashboard.banners.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-2 p-5" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-6">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">
                    موقعیت
                </label>
                <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">
                    لینک به دسته بندی
                </label>
                <select id="countries" name="side_group_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>انتخاب کنید</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->erp_code }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                    بارگذاری عکس
                </label>
                <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
            </div>
            <div class="col-span-2">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </x-dashboard.card>
</x-dashboard.main>
@endsection
