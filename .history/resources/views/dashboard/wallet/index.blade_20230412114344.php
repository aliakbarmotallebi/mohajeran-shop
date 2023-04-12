@extends('dashboard.base')
@section('title', 'مدیریت تراکنش ها کیف پول')
@section('content')
<x-dashboard.main title="لیست تراکنش ها کیف پول">
    <x-slot name="header"></x-slot>
    <x-slot name="append"></x-slot>
    <x-dashboard.card title="لیست تراکنش ها کیف پول" >
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
                        {{ $wallet->user->getPrivateFullName() }}
                        @if ($wallet->user->isContractApproved())
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                            دارای قراردادویژه
                        </span>
                        @endif
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

