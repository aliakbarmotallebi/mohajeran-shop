@extends('dashboard.layouts.base')
@section('title', ' مدیریت گالری تصاویر')
@section('content')

<x-dashboard.main title="مدیریت گالری تصاویر">
  <x-slot name="header"></x-slot>
  <x-slot name="append">
    @include('dashboard.settings._tabs')
  </x-slot>
  <x-dashboard.card title=" مدیریت گالری تصاویر">
    @livewire('upload-slider-image')
  </x-dashboard.card>
</x-dashboard.main>
@endsection
