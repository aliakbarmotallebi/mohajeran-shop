@extends('dashboard.layouts.base')
@section('title')
    مدیریت گالری محصولات
@endsection

@section('content')
    <x-dashboard.main title="گالری محصولات">
        <x-slot name="header"></x-slot>
        <x-slot name="append"></x-slot>
        <x-dashboard.card title="گالری محصولات">
            <div class="relative overflow-x-auto p-5">
                <div class="grid grid-cols-1 lg:grid-cols-4 sm:grid-cols-2 gap-4">
                @foreach ($products as $product)
                    <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 group relative">
                        <h5 class="flex items-center mb-2 text-sm font-light tracking-tight text-sky-500">
                            <div class="text-sm after:content-[':'] after:px-1 font-medium">
                                نام گالری درسیستم
                            </div>
                            <div class="mr-auto">
                            ({{ $product->condition }})
                            </div>
                        </h5>
                        <div class="font-light text-gray-700">
                            <div class="flex gap-4">
                                <div class="text-gray-500 text-sm after:content-[':'] after:px-1 font-medium">
                                تعداد محصولات ثبت شده
                                </div>
                                <span class="font-bold text-neutral-800 mr-auto">
                                    {{ $product->total }}
                                </span>
                            </div>
                            <div>
                                <div class="text-gray-500 text-sm after:content-[':'] after:px-1 font-medium">
                                نام اولین محصول ثبت شده
                                </div>
                                <div class="font-bold pt-3 text-sky-500">
                                    {{ $product->name }}
                                </div>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path></svg>
                    </a>
                @endforeach
                </div>
            </div>
        </x-dashboard.card>
    </x-dashboard.main>
@endsection
