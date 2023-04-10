@extends('dashboard.layouts.base')
@section('title')
    مدیریت گالری محصولات
@endsection

@section('content')
<x-dashboard.main title="گالری محصولات">
    <x-slot name="header">
        <div class="py-5">
            <a href="{{ route('dashboard.pinned_products.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                افزدون به لیست
            </a>
        </div>
    </x-slot>
    <x-slot name="append"></x-slot>
    <x-dashboard.card title="گالری محصولات">
        <form action="" class="items-center">
            <label for="simple-search" class="sr-only">
                موقعیت در صفحه
            </label>
            <div class="w-full flex items-center gap-2 py-3">
                <div class="w-full">
                    <select id="condition" name="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>انتخاب کنید</option>
                        <option value="SLIDER1">
                            SLIDER1
                        </option>
                        <option value="SLIDER2">
                            SLIDER2
                        </option>
                        <option value="SLIDER3">
                            SLIDER3
                        </option>
                        <option value="SLIDER4">
                            SLIDER4
                        </option>
                        <option value="SLIDER5">
                            SLIDER5
                        </option>
                        <option value="SLIDER6">
                            SLIDER6
                        </option>
                        <option value="SLIDER7">
                            SLIDER7
                        </option>
                        <option value="SLIDER8">
                            SLIDER8
                        </option>
                        <option value="SLIDER9">
                            SLIDER9
                        </option>
                    </select>
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </form>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        نام محصول
                    </th>
                    <th scope="col" class="px-6 py-3">
                        بارکد محصول
                    </th>
                    <th scope="col" class="px-6 py-3">
                        موقعیت در صفحه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        وزن
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->code }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $product->condition }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $product->weight }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end">
                                <form method="POST" action="{{ route('dashboard.pinned_products.destroy', $product)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="ml-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z"/></svg>
                                    </button>
                                </form>
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
