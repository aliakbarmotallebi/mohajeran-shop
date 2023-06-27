@extends('dashboard.layouts.base')
@section('title', 'پرداختی درگاه بانکی')

@section('content')
    <x-dashboard.main title="پرداختی درگاه بانکی">
        <x-slot name="header">
        </x-slot>
        <x-dashboard.card title="لیست رهگیری پرداخت آنلاین" class="!p-0">
            <div class="p-5 w-full">
                <form class="grid grid-cols-1  sm:grid-cols-2 xl:grid-cols-4 gap-5" method="GET">
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">
                            فیلتر براساس
                        </label>
                        <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected>
                                انتخاب کنید
                            </option>
                            <option value="PAID">
                                موفق
                            </option>
                            <option value="NONPAID">
                                ناموفق
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900">
                            شماره همراه
                        </label>
                        <input type="text" id="mobile" name="mobile"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="09120102010">
                    </div>
                    <div>
                        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">
                            نام و نام خانوادگی
                        </label>
                        <input type="text" id="fullname" name="fullname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="بهنام اکبری">
                    </div>
                    <div class="mt-7 flex">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            جستجو کن
                        </button>
                        <a href="{{ request()->url() }}"
                            class="py-2.5 px-5 mr-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                            پاک کن
                        </a>
                    </div>
                </form>
            </div>
            <x-dashboard.table>
                <x-slot name="header">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            کدرهگیری
                        </th>
                        <th scope="col" class="px-6 py-3">
                            مبلغ پرداختی
                            <span class="text-gray-400 text-xs">
                                (تومان)
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            کاربر پرداخت کننده
                        </th>
                        <th scope="col" class="px-6 py-3">
                            پاسخ درگاه
                        </th>
                        <th scope="col" class="px-6 py-3">
                            وضعیت پرداخت
                        </th>
                        <th scope="col" class="px-6 py-3">
                            تاریخ ایجاد
                        </th>
                    </tr>
                </x-slot>
                <x-slot name="content">
                    @foreach ($payments as $payment)
                        <tr class="bg-white border-b hover:bg-gray-100">
                            <th class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $payment->resnumber }}
                            </th>
                            <td scope="row" class="px-6 py-4 text-center">
                                {{ $payment->amount }}
                            </td>
                            <td scope="row" class="px-6 py-4 text-center">
                                {{ $payment->user->name }}
                            </td>
                            <td scope="row" class="px-6 py-4 text-center">
                                {{ $payment->result }}
                            </td>
                            <td class="px-6 py-4 text-center">

                                @if ($payment->isPaid())
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                        {{ $payment->getStatusLabel() }}
                                    </span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                                        {{ $payment->getStatusLabel() }}
                                    </span>
                                @endif
                            </td>
                            <td scope="row" class="px-6 py-4 text-center">
                                {{ $payment->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-dashboard.table>
        </x-dashboard.card>
        <div class="flex justify-between items-center p-5">
            {!! $payments->links('pagination::tailwind') !!}
        </div> 
    </x-dashboard.main>
@endsection
