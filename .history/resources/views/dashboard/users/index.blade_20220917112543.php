@extends('dashboard.layouts.base')
@section('title', 'مدیریت محصولات')
@section('content')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium ml-auto">
      لیست مشتریان
  </h2>
</div>

<livewire:user-list />
@endsection
