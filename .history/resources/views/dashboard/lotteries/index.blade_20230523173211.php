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
      <div class="mr-3">
        <p class="font-medium text-gray-800">
            {{ $lottery->name  }}
        </p>
        <div class="text-right w-52 truncate">
            <span class="text-sm text-gray-600">
                {{ $lottery->description ?? '' }}
            </span>
        <div class="group cursor-pointer inline-block border-b border-gray-400 text-center">
            <div class="opacity-0 bg-black text-white text-center text-xs rounded-lg py-2 absolute z-10 group-hover:opacity-100 bottom-full ml-14 px-3 pointer-events-none">
                {{ $lottery->description ?? '' }}
              <svg class="absolute text-black h-2 w-full right-0 top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"/></svg>
            </div>
        </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</x-dashboard.main>
@endsection
