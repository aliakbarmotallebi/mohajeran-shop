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
    <x-dashboard.card title="لیست جوایز">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        عکس جایزه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام جایزه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        توضیحات جایزه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        مقدار امتیاز جایزه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        وضعیت
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lottery->prizes as $prize)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 flex items-center justify-center text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ ($prize->image_url) }}" class="text-blue-500 hover:text-neutral-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918ZM20 15V5H4V19L14 9L20 15ZM20 17.8284L14 11.8284L6.82843 19H20V17.8284ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg>
                                </a>
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $prize->name }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $prize->description }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $prize->scores }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $prize->status }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end">
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-dashboard.card>
</x-dashboard.main>
@endsection
