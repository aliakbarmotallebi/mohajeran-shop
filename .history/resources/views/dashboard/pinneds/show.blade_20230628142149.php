@extends('dashboard.layouts.base')
@section('title')
    مدیریت گالری محصولات
@endsection

@section('content')
    <x-dashboard.main title="گالری محصولات">
        <x-slot name="header">
            <a href="{{ route('dashboard.pinned_products.create') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline ml-2 w-5 h-5" viewBox="0 0 24 24"><path d="M4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3ZM5 5V19H19V5H5ZM11 11V7H13V11H17V13H13V17H11V13H7V11H11Z"></path></svg>
                افزدون به لیست
            </a>
        </x-slot>
        <x-slot name="append"></x-slot>
        <x-dashboard.card title="افزدون به لیست">
            <form action="{{ route('dashboard.pinned_products.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-2 p-5" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="condition" class="block mb-2 text-sm font-medium text-gray-900">
                        موقعیت
                    </label>
                    <select id="condition" name="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                <div class="grid gap-6 mb-6 grid-cols-2">
                    <div>
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900">
                            بارکد محصول
                        </label>
                        <input type="number"  name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="00004" required>
                    </div>
                    <div>
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900">
                            وزن
                        </label>
                        <input type="number" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="1" required>
                    </div>
                </div>
    
                <div class="col-span-2">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        ذخیره تغییرات
                    </button>
                </div>
            </form>
        </x-dashboard.card>
        <x-dashboard.card title="گالری محصولات">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-center text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                نام محصول
                            </th>
                            <th scope="col" class="px-6 py-3">
                                بارکد محصول
                            </th>
                            <th scope="col" class="px-6 py-3">
                                وزن
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="bg-white border-b">
                                <th scope="row"
                                    class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $product->name }}
                                </th>
                                <th scope="row"
                                    class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
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
                                        <form method="POST"
                                            action="{{ route('dashboard.pinned_products.destroy', $product) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"
                                                class="ml-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                    width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path
                                                        d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z" />
                                                </svg>
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
