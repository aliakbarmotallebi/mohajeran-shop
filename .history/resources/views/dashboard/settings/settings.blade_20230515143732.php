@extends('dashboard.layouts.base')
@section('title')
    تنظیمات سیستم
@endsection

@section('content')
<x-dashboard.main title="تنظیمات سیستم">
    <x-slot name="header"></x-slot>
    <x-slot name="append">
        @include('dashboard.settings._tabs')
    </x-slot>
    <x-dashboard.card title="تنظیمات سیستم">
        <form action="{{ route('dashboard.settings.store') }}" class="p-5 grid grid-cols-1 md:grid-cols-2 gap-2" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-span-2 grid grid-cols-2 md:grid-cols-3 gap-2">
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        نسخه اپ
                    </label>
                    <input type="text" name="APP_VERSION" id="text" value="{{ settings('APP_VERSION') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        حداقل مبلغ خرید
                    </label>
                    <input type="text" id="text"  name="MIN_ORDER_PRICE" value="{{ settings('MIN_ORDER_PRICE') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                       زمان کاری فروشگاه
                    </label>
                    <input type="text" id="text" name="WORKING_TIME" value="{{ settings('WORKING_TIME') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                </div>
            </div>
            <div class="mb-6 col-span-2">
              <div class="grid grid-cols-2 gap-2">
                  <div class="mb-6">
                      <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                         زمان شروع پیام
                      </label>
                      <input type="time" id="text"  name="INSTANT_MESSAGINGS_START" value="{{ settings('INSTANT_MESSAGINGS_START') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                  </div>
                  <div class="mb-6">
                      <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                         زمان پایانی
                      </label>
                      <input type="time" id="text" name="INSTANT_MESSAGINGS_END" value="{{ settings('INSTANT_MESSAGINGS_END') }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                  </div>
              </div>
            </div>
            <div class="mb-6 col-span-2 gap-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    پیام مدیر سیستم
                </label>
                <textarea id="message" rows="4" name="INSTANT_MESSAGINGS" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{ settings('INSTANT_MESSAGINGS') }}</textarea>
                <span class="mt-1 text-gray-500 text-xs">
                    **
                        برای عدم نمایش پیام مدیرسیستم متن داخل باکس را خالی کنید
                </span>
            </div>
            <div class="mb-6 col-span-2">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    پیام مدیر پیش فرض
                </label>
                <textarea id="message" rows="4" name="INSTANT_MESSAGINGS_DEFAULT" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{ settings('INSTANT_MESSAGINGS_DEFAULT') }}</textarea>
                <span class="mt-1 text-gray-500 text-xs">
                    **
                        برای عدم نمایش پیام مدیرسیستم متن داخل باکس را خالی کنید
                </span>
            </div>

            <div class="col-span-2 grid grid-cols-3 gap-3">
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        عنوان اسلاید ویژه
                    </label>
                    <input type="text" name="SLIDER_TITLE" value="{{ settings('SLIDER_TITLE') }}"  id="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        رنگ اسلاید ویژه
                    </label>
                    <input type="color" name="SLIDER_COLOR" value="{{ settings('SLIDER_COLOR') }}"  id="text" class="" >
                </div>
                <div class="mb-6">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        بارگذاری تصویر اسلاید ویژه
                    </label>
                    <input name="SLIDER_IMAGE" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
            </div>

        
            <div class="col-span-2">
                @if(settings('SLIDER_IMAGE'))
                    <figure class="max-w-sm">
                        <img class="h-auto max-w-full rounded-lg" src="{{ settings('SLIDER_IMAGE') }}" alt="image">
                    </figure>
                @endif
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                ذخیره تغییرات
            </button>
        </form>
    </x-dashboard.card>
</x-dashboard.main>
@endsection