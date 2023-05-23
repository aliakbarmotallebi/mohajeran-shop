@extends('dashboard.layouts.base')
@section('title')
مدیریت قرعه کشی ها
@endsection

@section('content')
<x-dashboard.main title="لیست قرعه کشی ها">
  <x-slot name="header"></x-slot>
  <x-slot name="append"></x-slot>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-4 w-full">
    @foreach ($lotteries as $lottery)
    <div class="flex items-center relative p-4 w-full bg-white rounded-lg overflow-hidden shadow hover:shadow-md">
      <div class="w-12 h-12 rounded-full bg-gray-100"></div>
      <div class="ml-3">
        <p class="font-medium text-gray-800">John doe</p>
        <p class="text-sm text-gray-600">Last online 4 hours ago</p>
      </div>
    </div>
    @endforeach
  </div>
</x-dashboard.main>
@endsection
