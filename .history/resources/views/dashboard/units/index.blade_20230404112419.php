@extends('dashboard.layouts.base')
@section('title')
            لیست واحد های سیستم
@endsection

@section('content')
    <section class="cart mt-4 rounded-t-md rounded-xl border shadow-md bg-white">
        <div class="cart__title flex w-full items-center justify-between border-b p-5 pb-3">
            <span class="font-semibold">
                    لیست واحد های سیستم
            </span>
        </div>
        <div class="cart__content overflow-x-auto whitespace-nowrap px-5 py-5">
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
                    @foreach($units as $unit)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $unit->erp_code }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $unit->name }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $unit->few }}
                        </td>
                       <td class="px-6 py-4 text-center">
                            {{ $unit->arithmetic_few }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $unit->min_few }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end">
                                <a href="{{ route('dashboard.units.edit', $unit) }}" target="_blank" class="ml-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection