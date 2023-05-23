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
      <div class="flex items-center w-12 h-12 rounded-full bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 inline text-yellow-400 fill-current"  viewBox="0 0 24 24"><path d="M11 19V13.8889L3 5V3H21V5L13 13.8889V19H18V21H6V19H11ZM7.49073 7H16.5093L18.3093 5H5.69072L7.49073 7ZM9.29072 9L12 12.0103L14.7093 9H9.29072Z"></path></svg>
      </div>
      <div class="mr-3 relative">
        <p class="font-medium text-gray-800">
            {{ $lottery->name  }}
        </p>
        <div class="text-right w-52 truncate">
            <span class="text-sm text-gray-600">
                {{ $lottery->description }}
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
