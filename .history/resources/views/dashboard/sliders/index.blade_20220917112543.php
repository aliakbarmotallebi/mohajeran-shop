@extends('dashboard.layouts.base')
@section('title', 'مدیریت گالری')
@section('content')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium ml-auto">
      گالری تصاویر
  </h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    @foreach($sliders as $slider)
            <livewire:upload-slider-image :slider="$slider" />
    @endforeach
</div>
@endsection
