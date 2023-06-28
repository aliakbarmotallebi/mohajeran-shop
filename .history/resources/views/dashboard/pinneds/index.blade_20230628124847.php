@extends('dashboard.layouts.base')
@section('title')
    مدیریت گالری محصولات
@endsection

@section('content')
    <x-dashboard.main title="گالری محصولات">
        <x-slot name="header"></x-slot>
        <x-slot name="append"></x-slot>
        <x-dashboard.card title="گالری محصولات">
            <div class="relative overflow-x-auto">
                <div class="grid grid-cols-1 lg:grid-cols-4 sm:grid-cols-2">
                @foreach ($products as $product)
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </a>
                @endforeach
                </div>
            </div>
        </x-dashboard.card>
    </x-dashboard.main>
@endsection
