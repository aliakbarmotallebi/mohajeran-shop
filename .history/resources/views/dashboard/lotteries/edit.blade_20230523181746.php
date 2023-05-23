@extends('dashboard.layouts.base')
@section('title')
 قرعه کشی 
{{ $lottery->name }}
@endsection

@section('content')
<x-dashboard.main title="{{ $lottery->name }}">
  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>
    <table class="w-full text-sm text-left text-gray-500 bg-white border rounded-lg mb-10">
        <tbody>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 text-right">
                    نام قرعه کشی
                </th>
                <td class="px-6 py-4 text-right whitespace-nowrap">
                    {{ $lottery->name }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 text-right">
                توضیحات قرعه کشی
                <td class="px-6 py-4 text-right whitespace-nowrap">
                    {{ $lottery->description }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 text-right">
                    لینک مستقیم عکس
                </th>
                <td class="px-6 py-4 text-right whitespace-nowrap">
                    {{ $lottery->image_url}}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 text-right">
                    تاریخ ایجاد
                </th>
                <td class="px-6 py-4 text-right whitespace-nowrap">
                    {{ verta($lottery->start_at)->format('Y-m-d') }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 text-right">
                    تاریخ برگزاری
                </th>
                <td class="px-6 py-4 text-right whitespace-nowrap">
                    {{ verta($lottery->end_at)->format('Y-m-d') }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 text-right">
                    وضعیت نمایش
                </th>
                <td class="px-6 py-4 text-right whitespace-nowrap">
                    @if ($lottery->status == 'STATUS_CONFIRMED')
                        <span class="text-green-800 text-xs font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z"/></svg>
                           منتشر شده
                        </span>
                    @else
                        <span class="text-red-800 text-xs font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-9.414l2.828-2.829 1.415 1.415L13.414 12l2.829 2.828-1.415 1.415L12 13.414l-2.828 2.829-1.415-1.415L10.586 12 7.757 9.172l1.415-1.415L12 10.586z"/></svg>
                            عدم انتشار
                        </span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <x-dashboard.card title="لیست واحد های سیستم">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ERO_CODE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام واحد
                    </th>
                    <th scope="col" class="px-6 py-3">
                        مقدار اصلی
                    </th>
                    <th scope="col" class="px-6 py-3">
                        مفدار محاسبه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        حداقل مقدار سفارش
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </x-dashboard.card>
</x-dashboard.main>
@endsection
