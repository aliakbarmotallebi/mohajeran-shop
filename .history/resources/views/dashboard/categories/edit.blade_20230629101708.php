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
                    <label class="text-sm">                        بارگذاری عکس
                        <span class="inline-flex bg-red-500 w-1 h-1 rounded-full"></span>
                    </label>

                        <label for="image_before_file"
                            class="mt-3 text-neutral-700  cursor-pointer border-2 border-gray-400 border-dashed px-3 py-1 transition-all duration-200 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current inline ml-1"
                                viewBox="0 0 24 24">
                                <path
                                    d="M1 14.5C1 12.1716 2.22429 10.1291 4.06426 8.9812C4.56469 5.044 7.92686 2 12 2C16.0731 2 19.4353 5.044 19.9357 8.9812C21.7757 10.1291 23 12.1716 23 14.5C23 17.9216 20.3562 20.7257 17 20.9811L7 21C3.64378 20.7257 1 17.9216 1 14.5ZM16.8483 18.9868C19.1817 18.8093 21 16.8561 21 14.5C21 12.927 20.1884 11.4962 18.8771 10.6781L18.0714 10.1754L17.9517 9.23338C17.5735 6.25803 15.0288 4 12 4C8.97116 4 6.42647 6.25803 6.0483 9.23338L5.92856 10.1754L5.12288 10.6781C3.81156 11.4962 3 12.927 3 14.5C3 16.8561 4.81833 18.8093 7.1517 18.9868L7.325 19H16.675L16.8483 18.9868ZM13 13V17H11V13H8L12 8L16 13H13Z">
                                </path>
                            </svg>
                            <small>بارگذاری عکس یا فایل مربوطه</small>
                        </label>
                        <input type="file" id="image" name="image_before_file"
                            class="hidden" />
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
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:right-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600">
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
