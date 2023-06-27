@extends('dashboard.layouts.base')
@section('title')
    افزدون گالری محصولات
@endsection

@section('content')
<x-dashboard.main title="افزدون به لیست">
    <x-slot name="header"></x-slot>
    <x-slot name="append"></x-slot>
    <x-dashboard.card title="افزدون به لیست">
        <form action="{{ route('dashboard.pinned_products.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-2" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-6">
                <label for="condition" class="block mb-2 text-sm font-medium text-gray-900">
                    موقعیت
                </label>
                <select id="condition" name="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>انتخاب کنید</option>
                    <option value="SLIDER1">
                        SLIDER1
                    </option>
                    <option value="SLIDER2">
                        SLIDER2
                    </option>
                    <option value="SLIDER3">
                        SLIDER3
                    </option>
                    <option value="SLIDER4">
                        SLIDER4
                    </option>
                    <option value="SLIDER5">
                        SLIDER5
                    </option>
                    <option value="SLIDER6">
                        SLIDER6
                    </option>
                    <option value="SLIDER7">
                        SLIDER7
                    </option>
                    <option value="SLIDER8">
                        SLIDER8
                    </option>
                    <option value="SLIDER9">
                        SLIDER9
                    </option>
                </select>
            </div>
            <div class="grid gap-6 mb-6 grid-cols-2">
                <div>
                    <label for="code" class="block mb-2 text-sm font-medium text-gray-900">
                        بارکد محصول
                    </label>
                    <input type="number"  name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00004" required>
                </div>
                <div>
                    <label for="weight" class="block mb-2 text-sm font-medium text-gray-900">
                        وزن
                    </label>
                    <input type="number" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                </div>
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
