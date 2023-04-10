@extends('dashboard.layouts.base') @section('title', 'صفحه اصلی') @section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="flex items-center justify-between h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        گزارش کلی سیستم
                    </h2>

                </div>
                <x-init-dashboard/>
            </div>
        </div>
    </div>
</div>


<div class="grid grid-cols-12 gap-6 mt-9">
    <livewire:form-courier-costs/>


    <div class="grid col-span-6 rounded-md">
        <livewire:upload-slider-image/>
    </div>
</div>
@endsection
