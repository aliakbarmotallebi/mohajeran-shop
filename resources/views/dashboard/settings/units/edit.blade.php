@extends('dashboard.layouts.base')
@section('title')
    ویرایش  واحد
    {{ $unit->name }}
@endsection

@section('content')
<x-dashboard.main title="ویرایش واحد">
    <x-slot name="header"></x-slot>
    <x-slot name="append">
        @include('dashboard.settings._tabs')
    </x-slot>
    <x-dashboard.card title="{{ $unit->name }}">
        <form action="{{ route('dashboard.units.update', $unit) }}" class="grid grid-cols-1 md:grid-cols-2 gap-2" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    نام واحد
                </label>
                <input name="name" value="{{ $unit->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text">
            </div>

            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    مقدار اصلی
                </label>
                <input name="few" value="{{ $unit->few }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text">
            </div>
            
                            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    مفدار محاسبه
                </label>
                <input name="arithmetic_few" value="{{ $unit->arithmetic_few }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text">
            </div>
            
                            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    حداقل مقدار سفارش
                </label>
                <input name="min_few" value="{{ $unit->min_few }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text">
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                ذخیره تغییرات
            </button>
        </form>
    </x-dashboard.card>
</x-dashboard.main>
@endsection
