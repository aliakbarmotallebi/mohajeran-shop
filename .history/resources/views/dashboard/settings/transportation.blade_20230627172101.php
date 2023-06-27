@extends('dashboard.layouts.base')
@section('title', ' مدیریت هزینه پیک')
@section('content')

    <x-dashboard.main title="مدیریت هزینه پیک">
        <x-slot name="header"></x-slot>
        <x-slot name="append">
            @include('dashboard.settings._tabs')
        </x-slot>
        <x-dashboard.card title=" مدیریت هزینه پیک">

            <form method="post" action="{{ route('dashboard.products.update', $product) }}"
                class="grid grid-cols-1 md:grid-cols-2 gap-2 pb-5 p-16">

                @csrf
                @method('put')
                <div class="form-group mb-2 mt-2">
                    <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700 font-bold">
                        نام کالا
                    </label>
                    <input type="text" name="name" value="{{ $product->name }}"
                        class="form-control 
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="form-group mb-2 mt-2">
                    <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700 font-bold">
                        تعداد</label>
                    <input type="text" name="few" value="{{ $product->few }}"
                        class="form-control 
                          block
                          w-full
                          px-3
                          py-1.5
                          text-base
                          font-normal
                          text-gray-700
                          bg-white bg-clip-padding
                          border border-solid border-gray-300
                          rounded
                          transition
                          ease-in-out
                          m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="form-group mb-2 mt-2">
                    <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700 font-bold">
                        تعداد تک فروشی
                    </label>
                    <input type="text" name="fewtak" value="{{ $product->fewtak }}"
                        class="form-control 
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </x-dashboard.card>
    </x-dashboard.main>
@endsection
