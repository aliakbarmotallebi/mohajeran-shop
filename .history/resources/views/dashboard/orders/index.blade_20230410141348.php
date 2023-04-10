@extends('dashboard.layouts.base')
@section('title', 'مدیریت سفارشات')


@section('content')
@livewire('modals.message-from-admin')
<x-dashboard.main title="مدیریت مشتریان">
  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>
  <livewire:order-list/>
</x-dashboard.main>
@endsection
