@extends('dashboard.layouts.base')
@section('title', ' مدیریت هزینه پیک')
@section('content')

    <x-dashboard.main title="مدیریت هزینه پیک">
        <x-slot name="header"></x-slot>
        <x-slot name="append">
            @include('dashboard.settings._tabs')
        </x-slot>
        <x-dashboard.card title=" مدیریت هزینه پیک">

            <form action="{{ route('dashboard.settings.transportationStore') }}" class="p-5" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                           هزینه تاکسی
                        </label>
                        <input type="text" name="TAXI_FARE" id="text" value="{{ settings('TAXI_FARE') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                         کرایه
                            مبلغ زیر ۱۰هزارتومان
                        </label>
                        <input type="text" id="text"  name="TRANSPORTATION_COST_1" value="{{ settings('TRANSPORTATION_COST_1') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۲۰هزارتومان
                        </label>
                        <input type="text" id="text" name="TRANSPORTATION_COST_2" value="{{ settings('TRANSPORTATION_COST_2') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه                             مبلغ زیر ۳۰هزارتومان
                        </label>
                        <input type="text" name="TRANSPORTATION_COST_3" id="text" value="{{ settings('TRANSPORTATION_COST_3') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۴۰هزارتومان
                        </label>
                        <input type="text" id="text"  name="TRANSPORTATION_COST_4" value="{{ settings('TRANSPORTATION_COST_4') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۵۰هزارتومان
                        </label>
                        <input type="text" id="text" name="TRANSPORTATION_COST_5" value="{{ settings('TRANSPORTATION_COST_5') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۶۰هزارتومان
                        </label>
                        <input type="text" name="TRANSPORTATION_COST_6" id="text" value="{{ settings('TRANSPORTATION_COST_6') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۷۰هزارتومان
                        </label>
                        <input type="text" id="text"  name="TRANSPORTATION_COST_7" value="{{ settings('TRANSPORTATION_COST_7') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۸۰هزارتومان
                        </label>
                        <input type="text" id="text" name="TRANSPORTATION_COST_8" value="{{ settings('TRANSPORTATION_COST_8') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">
                            کرایه
                            مبلغ زیر ۹۰هزارتومان
                        </label>
                        <input type="text" name="TRANSPORTATION_COST_9" id="text" value="{{ settings('TRANSPORTATION_COST_9') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:shadow-sm-light" >
                    </div>
                    <div class="col-span-2 md:col-span-3">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                            ذخیره تغییرات
                        </button>
                    </div>
                </div>
            </form>
        </x-dashboard.card>
    </x-dashboard.main>
@endsection
