@extends('dashboard.layouts.base')
@section('title', 'مدیریت مشتریان')
@section('content')
<x-dashboard.main title="مدیریت مشتریان">
  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>
  <x-dashboard.card title="لیست مشتریان">
      @livewire('user-list')
  </x-dashboard.card>
</x-dashboard.main>
@endsection
