@extends('dashboard.layouts.base')
@SLIDER('title')
    افزدون به Slide show

@endSLIDER

@section('content')

    <div class="cart mt-4 rounded-t-md rounded-xl border shadow-md bg-white">
        <div class="cart__title flex w-full items-center justify-between border-b p-5 pb-3">
            <span class="font-semibold">
                  افزدون به Slide show
            </span>
        </div>
        <div class="cart__content overflow-x-auto whitespace-nowrap px-5 py-5">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('dashboard.pinned_products.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-2" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        موقعیت
                    </label>
                    <select id="condition" name="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>انتخاب کنید</option>
                        <option value="SLIDER1">
                            SLIDER1
                        </option>
                        <option value="SLIDER2">
                            SLIDER2
                        </option>
                        <option value="SLIDER3">
                            SLIDER3
                        </option>
                        <option value="SLIDER4">
                            SLIDER4
                        </option>
                        <option value="SLIDER5">
                            SLIDER5
                        </option>
                        <option value="SLIDER6">
                            SLIDER6
                        </option>
                        <option value="SLIDER7">
                            SLIDER7
                        </option>
                        <option value="SLIDER8">
                            SLIDER8
                        </option>
                        <option value="SLIDER9">
                            SLIDER9
                        </option>
                    </select>
                </div>
                <div class="grid gap-6 mb-6 grid-cols-2">
                    <div>
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            بارکد محصول
                        </label>
                        <input type="number"  name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00004" required>
                    </div>
                    <div>
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            وزن
                        </label>
                        <input type="number" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                    </div>
                </div>

                <div class="col-span-2">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        ذخیره تغییرات
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
