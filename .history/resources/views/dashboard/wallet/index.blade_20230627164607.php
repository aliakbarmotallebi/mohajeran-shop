@extends('dashboard.layouts.base')
@section('title', 'مدیریت تراکنش ها کیف پول')
@section('content')
<x-dashboard.main title="لیست تراکنش ها کیف پول">
    <x-slot name="header"></x-slot>
    <x-slot name="append"></x-slot>
    <x-dashboard.card title="لیست تراکنش ها کیف پول" >
        <div class="p-5 w-full">
            <form class="grid grid-cols-1  sm:grid-cols-2 xl:grid-cols-4 gap-5" method="GET">   
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">
                        فیلتر براساس
                    </label>
                        <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected>
                                انتخاب کنید
                            </option>
                            <option value="TYPE_DEPOSIT">
                                واریز
                            </option>
                            <option value="TYPE_WITHDRAW">
                                برداشت
                            </option>
                        </select>
                    </div>
                <div>
                    <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900">
                        شماره همراه
                    </label>
                    <input type="text" id="mobile" name="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                    placeholder="09120102010">
                </div>
                <div>
                    <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">
                        نام و نام خانوادگی
                    </label>
                    <input type="text" id="fullname" name="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                    placeholder="بهنام اکبری">
                </div>
                <div class="mt-7">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                        جستجو کن
                    </button>
                    <a href="{{ request()->url() }}" class="py-2.5 px-5 mr-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                        پاک کن
                    </a>
                </div>
            </form>
        </div>
        <x-dashboard.table class="!mt-0">
            <x-slot name="header">
                <tr>
                    <th scope="col" class="px-6 py-3  whitespace-nowrap">
                    کاربر ایجاد کننده
                    </th>
                    <th scope="col" class="px-6 py-3  whitespace-nowrap">
                    مبلغ
                    <span class="text-gray-400 text-xs">
                    (ریال) 
                    </span>
                    </th>
                    <th scope="col" class="px-6 py-3  whitespace-nowrap">
                    مبلغ مانده
                    <span class="text-gray-400 text-xs">
                    (ریال) 
                    </span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                    توضیحات کوتاه
                    </th>
                    <th scope="col" class="px-6 py-3">
                    نوع تراکنش
                    </th>
                    <th scope="col" class="px-6 py-3">
                    وضعیت تراکنش
                    </th>
                    <th scope="col" class="px-6 py-3">
                    تاریخ تراکنش
                    </th>
                </tr>
            </x-slot>
            <x-slot name="content">
                @foreach ($wallets['List'] as $wallet)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td scope="row" class="px-6 py-4 text-center">
                        {{ $wallet->user->name ?? $wallet->user->mobile }}
                    </td>
                    <td scope="row" class="px-6 py-4 text-center">
                        {{ $wallet->getAmount() }}
                    </td>
                    <td scope="row" class="px-6 py-4 text-center">
                        {{ number_format($wallet->getBalance()) }}
                    </td>
                    <td scope="row" class="px-6 py-4 text-center whitespace-nowrap">
                        {{ $wallet->summery }} 
                    </td>
                    <td scope="row" class="px-6 py-4 text-center  whitespace-nowrap">
                        @if ($wallet->type == 'TYPE_DEPOSIT')
                        <div class="text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline fill-current" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"/></svg>
                            واریز به کیف پول
                        </div>
                        @else
                        <div class="text-rose-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline fill-current" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 16.172l5.364-5.364 1.414 1.414L12 20l-7.778-7.778 1.414-1.414L11 16.172V4h2v12.172z"/></svg>                                    
                            برداشت از کیف پول
                        </div>                            
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center  whitespace-nowrap">
                        @if ($wallet->status == 'STATUS_COMPLETED')
                            <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                            تراکنش موفق
                            </span>
                            @else
                            <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                        تراکنش ناموفق
                            </span>
                        @endif
                    </td>
                    <td scope="row" class="px-6 py-4 text-center">
                        {{ $wallet->getCreatedAt() }}
                    </td>
                </tr>
                @endforeach
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left" colspan="2">
                        مبلغ کل پرداختی ناموفق 
                        <span class="text-rose-600 text-xs mr-1">
                            {{ number_format($wallets['Withdraw'])}}
                            (ریال)
                        </span>
                    </th>
                    <th class="px-6 py-3 text-right" colspan="2">
                        مبلغ کل پرداختی موفق 
                        <span class="text-green-600 text-xs mr-1">
                            {{ number_format($wallets['Deposit']) }}
                            (ریال)
                        </span>
                    </th>
                    <th class="px-6 py-3 text-right" colspan="3">
                        مبلغ کل پرداختی ها 
                        <span class="text-gray-400 text-xs mr-1">
                            {{ number_format($wallets['Valid']) }}
                            (ریال)
                        </span>
                    </th>
                </tr>
            </x-slot>
        </x-dashboard.table>
        <x-slot name="footer" class="p-3">
            {!! $wallets['List']->links('pagination::tailwind') !!}
        </x-slot>
    </x-dashboard.card>
</x-dashboard.main>

@endsection

