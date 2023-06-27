@extends('dashboard.layouts.base')
@section('title', ' مدیریت هزینه پیک')
@section('content')

    <x-dashboard.main title="مدیریت هزینه پیک">
        <x-slot name="header"></x-slot>
        <x-slot name="append">
            @include('dashboard.settings._tabs')
        </x-slot>
        <x-dashboard.card title=" مدیریت هزینه پیک">

            <form action="{{ route('dashboard.settings.store') }}" class="p-5" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                           هزینه تاکسی
                        </label>
                        <input type="text" name="APP_VERSION" id="text" value="{{ settings('APP_VERSION') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                         کرایه
                            مبلغ زیر ۱۰هزارتومان
                        </label>
                        <input type="text" id="text"  name="MIN_ORDER_PRICE" value="{{ settings('MIN_ORDER_PRICE') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۲۰هزارتومان
                        </label>
                        <input type="text" id="text" name="WORKING_TIME" value="{{ settings('WORKING_TIME') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه                             مبلغ زیر ۳۰هزارتومان
                        </label>
                        <input type="text" name="APP_VERSION" id="text" value="{{ settings('APP_VERSION') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۴۰هزارتومان
                        </label>
                        <input type="text" id="text"  name="MIN_ORDER_PRICE" value="{{ settings('MIN_ORDER_PRICE') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۵۰هزارتومان
                        </label>
                        <input type="text" id="text" name="WORKING_TIME" value="{{ settings('WORKING_TIME') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۶۰هزارتومان
                        </label>
                        <input type="text" name="APP_VERSION" id="text" value="{{ settings('APP_VERSION') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۷۰هزارتومان
                        </label>
                        <input type="text" id="text"  name="MIN_ORDER_PRICE" value="{{ settings('MIN_ORDER_PRICE') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۸۰هزارتومان
                        </label>
                        <input type="text" id="text" name="WORKING_TIME" value="{{ settings('WORKING_TIME') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۹۰هزارتومان
                        </label>
                        <input type="text" name="APP_VERSION" id="text" value="{{ settings('APP_VERSION') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                </div>
            </form>
        </x-dashboard.card>
    </x-dashboard.main>
@endsection
