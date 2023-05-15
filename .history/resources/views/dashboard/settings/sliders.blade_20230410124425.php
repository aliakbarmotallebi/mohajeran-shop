@extends('dashboard.layouts.base')
@section('title', ' مدیریت گالری تصاویر')
@section('content')

<x-dashboard.main title="مدیریت گالری تصاویر">
  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>
  <x-dashboard.card title=" مدیریت گالری تصاویر">
    @foreach($sliders as $slider)
            <livewire:upload-slider-image :slider="$slider" />
    @endforeach
  </x-dashboard.card>
</x-dashboard.main>
@endsection