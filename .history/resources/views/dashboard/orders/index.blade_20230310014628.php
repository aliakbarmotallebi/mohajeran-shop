@extends('dashboard.layouts.base')
@section('title', 'مدیریت سفارشات')


@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium ml-auto">
      لیست سفارشات
  </h2>
</div>
<div class="bg-transparent mt-5">
  <livewire:order-list/>
</div>
@endsection
