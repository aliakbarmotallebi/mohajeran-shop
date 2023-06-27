@extends('dashboard.layouts.base')
@section('title', 'صفحه اصلی') 

@section('content')
    <x-dashboard.main>
        <x-slot name="header">
            <button class="py-2 px-5 bg-rose-500 text-center text-sm rounded-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-flex ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                خروج از سیستم
            </button>
        </x-slot>
            <div class="grid grid-cols-12 ">
                <div class="col-span-12">
                    <x-init-dashboard/>
                </div>
            </div>
    </x-dashboard.main>
@endsection
