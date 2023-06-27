@extends('dashboard.layouts.base')
@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <x-dashboard.main title="ویرایش محصول">
        <x-slot name="header"></x-slot>
        <x-slot name="append"></x-slot>
        <x-dashboard.card title="{{ $product->name }}">
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
                    <div class="form-group mb-2 mt-2">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700 font-bold">
                            قیمت
                        </label>
                        <input type="text" name="sell_price" value="{{ $product->getPriceOriginal() }}"
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
                            مشخصات فنی 1
                        </label>
                        <input type="text" name="other1" value="{{ $product->other1 }}"
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
                            مشخصات فنی دو
                        </label>
                        <input type="text" name="other2" value="{{ $product->other2 }}"
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
                            مشخصات فنی سه
                        </label>
                        <input type="text" name="other3" value="{{ $product->other3 }}"
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
                            مشخصات فنی چهار
                        </label>
                        <input type="text" name="other4" value="{{ $product->other4 }}"
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
                            مشخصات فنی پنج
                        </label>
                        <input type="text" name="other5" value="{{ $product->other5 }}"
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
                            تخفیف
                        </label>
                        <input type="text" name="discount_price"
                            value="{{ $product->getRawOriginal('discount_price') }}"
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


                    <div class="mt-2">
                        <label for="countries" class="block mb-2 text-sm font-bold text-gray-900">
                            کد واحد
                        </label>
                        <select name="unit_erp_code"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected value="0">
                                واحد را انتخاب کنید
                            </option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->erp_code }}"
                                    {{ $unit->erp_code == $product->unit_erp_code ? 'selected' : '' }}>
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-10 col-span-1 lg:col-span-2">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">
                            بروز رسانی
                        </button>
                    </div>

                </form>
 
        </x-dashboard.card>
    </x-dashboard.main>
@endsection
