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
                <div
                    class="flex items-center relative p-4 w-full bg-white rounded-lg overflow-hidden shadow hover:shadow-md">
                    <div class="w-12 h-12 rounded-full bg-yellow-100 text-yellow-400 flex items-center justify-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M11 19V13.8889L3 5V3H21V5L13 13.8889V19H18V21H6V19H11ZM7.49073 7H16.5093L18.3093 5H5.69072L7.49073 7ZM9.29072 9L12 12.0103L14.7093 9H9.29072Z">
                            </path>
                        </svg>
                    </div>
                    <div class="mr-3 relative">
                        <p class="font-medium text-gray-800 truncate w-60">
                            {{ $lottery->name }}
                        </p>
                        <div class="py-2">
                    @if($lottery->isPast())
                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                        درحال برگزاری
                    </span>

                            @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">
                                منقضی شده
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="mr-auto">
                        <div class="py-2">
                            <a href="{{ route('dashboard.lotteries.edit', $lottery) }}"  class="hover:opacity-60">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><path d="M11 2C15.968 2 20 6.032 20 11C20 15.968 15.968 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2ZM11 18C14.8675 18 18 14.8675 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18ZM19.4853 18.0711L22.3137 20.8995L20.8995 22.3137L18.0711 19.4853L19.4853 18.0711Z"></path></svg>
                            </a>
                            @livewire('handle-status', [
                                'entity' => $lottery
                            ])
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-dashboard.main>
@endsection
