@extends('dashboard.layouts.base')
@section('title')
    ویرایش دسته بندی
    {{ $category->name }}
@endsection

@section('content')
    <x-dashboard.main title="ویرایش دسته بندی">
        <x-slot name="header"></x-slot>
        <x-slot name="append"></x-slot>
        <x-dashboard.card title="{{ $category->name }}">
            <form action="{{ route('dashboard.categories.update', $category) }}"
                class="grid grid-cols-1 md:grid-cols-2 gap-2 p-5" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">
                        فروشنده شهروند
                    </label>
                    <select id="countries" name="vendor"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>انتخاب کنید</option>
                        <option value="0" {{ $category->is_vendor == 0 ? 'selected' : '' }}>
                            خیر
                        </option>
                        <option value="1" {{ $category->is_vendor == 1 ? 'selected' : '' }}>
                            فروشنده شهروند
                        </option>

                    </select>
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                        بارگذاری عکس
                    </label>
                    <input name="image"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>

                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                        ساعت کاری
                    </label>
                    <input name="time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text" value="{{ $category->time }}">
                </div>
                <div>
                    <label class="relative inline-flex justify-center items-center mr-5 cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:-left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
                        </div>
                        <span class="mr-3 text-sm font-medium text-gray-900">
                            میخوام به عنوان این دسته بندی فرشنده های شهروند باشد
                        </span>
                    </label>
                </div>
                <div class="col-span-2">
                    @if ($category->image)
                        <figure class="max-w-sm">
                            <img class="h-auto max-w-full rounded-lg" src="{{ $category->image }}" alt="image">
                        </figure>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        ذخیره تغییرات
                    </button>
                </div>
            </form>
        </x-dashboard.card>
    </x-dashboard.main>
@endsection
