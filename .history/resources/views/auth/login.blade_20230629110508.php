@extends('auth.layouts.base') @section('title', 'صفحه ورود به حساب') @section('content')

<div class="min-h-screen bg-slate-900 flex flex-col justify-center">
    <div class="mx-auto w-full  md:max-w-xl lg:max-w-3xl">
        @livewire('security')
    </div>
</div>
@endsection