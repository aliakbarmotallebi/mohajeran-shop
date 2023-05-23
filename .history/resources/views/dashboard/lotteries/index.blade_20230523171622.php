@extends('dashboard.layouts.base')
@section('title')
مدیریت قرعه کشی ها
@endsection

@section('content')
<x-dashboard.main title="لیست قرعه کشی ها">
  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>
  
</x-dashboard.main>
@endsection
