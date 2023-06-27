@extends('dashboard.layouts.base')
@section('title', ' مدیریت هزینه پیک')
@section('content')

<x-dashboard.main title="مدیریت هزینه پیک">
  <x-slot name="header"></x-slot>
  <x-slot name="append">
    @include('dashboard.settings._tabs')
  </x-slot>
  <x-dashboard.card title=" مدیریت هزینه پیک">
  </x-dashboard.card>
</x-dashboard.main>
@endsection
