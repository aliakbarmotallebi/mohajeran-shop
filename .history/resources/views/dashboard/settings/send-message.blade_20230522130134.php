@extends('dashboard.layouts.base')
@section('title')
    ارسال گروهی پیامک به کاربران
@endsection

@section('content')
<x-dashboard.main title="ارسال گروهی پیامک به کاربران">
    <x-slot name="header"></x-slot>
    <x-slot name="append">
        @include('dashboard.settings._tabs')
    </x-slot>
    <x-dashboard.card title="ارسال گروهی پیامک به کاربران">
        <form action="{{ route('dashboard.settings.send-message.submit') }}" class="p-5 grid grid-cols-1" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-6">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                   متن پیام
                </label>
                <textarea id="message" rows="4" name="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
            </div>
            <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default checkbox</label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                ارسال پیام گروهی
            </button>
        </form>
    </x-dashboard.card>
</x-dashboard.main>
@endsection