@extends('dashboard.layouts.base')
@section('title')
    شماره سفارش
    {{ $order->id }}
@endsection


@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium ml-auto">
    شماره سفارش
    {{ $order->id }}
    <span class="hidden print:block">
        (فاکتور فروشگاه آنلاین شهروند مهاجر)
    </span>
  </h2>
</div>
<div class="bg-transparent mt-5">
    <section>
        <div class="print:mb-5 m-3 flex items-center">
            <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                پرداخت درب منزل
            </button>
            <button type="button" class="py-1 px-2 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-800 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <span class="text-xs ml-1 font-semibold">
                    تاریخ ایجاد سفارش
                </span>
                {{ verta($order->created_at)->format('H:i Y-m-d') }}
            </button>
            <button onclick="window.print()" class="bg-gray-900 print:hidden text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                <span class="mr-1 text-xs">
                پرینت فاکتور
                </span>
            </button>
        </div>
    </section>

    <!-- Cart -->
<section class="cart mt-4 rounded-t-md print:rounded-none">
    <div class="rounded-xl border print:shadow-none print:rounded-none bg-white border-gray-600 overflow-hidden">
        <div class="cart__title flex w-full items-center justify-between border-b border-gray-600 p-5 pb-3">
            <span class="font-semibold">
                نمایش فاکتور سفارش
            </span>
        </div>
        <div class="cart__content">
            <div class="relative print:shadow-none print:rounded-none sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead 
                            class='text-center text-xs text-gray-700 uppercase bg-gray-100'
                            >
                        <tr>
                            <th scope="col" class="font-semibold px-6 py-3">
                                نام و نام خانوادگی
                            </th>
                            <th scope="col" class="font-semibold px-6 py-3">
                                آدرس محل سکونت
                            </th>
                            <th scope="col" class="font-semibold px-6 py-3">
                                شماره همراه
                            </th>
                        </tr>
                    </thead>
                    <tbody class='text-right'>
                        <tr class="bg-white border-gray-600 border-b-2 hover:bg-gray-100">
                            <th class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                               {{ $order->user->name }}
                            </th>
                            <td scope="row" class="px-6 py-4 text-center">
                                {{ $order->user->address }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $order->user->mobile }}
                            </td>
                        </tr>
                    </tbody>

                    <table class="w-full text-xs text-left text-gray-700">
                        <tr class="print:mt-4 bg-gray-100 ">
                            <th scope="col" class="font-semibold px-6 py-3 text-center">
                                نام محصول
                            </th>
                            <th scope="col" class="font-semibold px-6 py-3 text-center">
                                بارکد محصول
                            </th>
                            <th scope="col" class="font-semibold px-6 py-3 text-center">
                               قیمت کل
                            </th>
                            <th scope="col" class="font-semibold px-6 py-3 text-center">
                               تعداد سفارش
                             </th>
                            <th scope="col" class="font-semibold px-6 py-3 text-center">
                                قیمت واحد
                                <span class="text-gray-400 text-xs">
                                    (تومان) 
                                </span>
                            </th>
                            <th scope="col" class="font-semibold px-6 py-3">
                                توضیحات
                             </th>
                        </tr>

                        @if($order->items->count() > 0 )
                            @foreach ($order->items as $item)
                                <tr class="bg-white print:border-y border-gray-700 border-b hover:bg-gray-100">
                                    <td class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->product->name }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        {{ $item->product->code ?? null }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        <span class="font-medium text-gray-800">
                                            {{ ($item->getPrice() * $item->getQuantity()) }}
                                          </span>
                                          تومان
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        <span class="font-medium text-gray-800">
                                            {{ $item->getQuantity() }}
                                        </span>
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        <span class="font-medium text-gray-800">
                                            {{ $item->getPrice() }}
                                        </span>
                                          تومان
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        <span class="font-medium text-gray-800">
                                            {{ $item->comment }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-white">
                                <th colspan="4"  class="px-6 py-3 text-left font-bold">
                                    مبلغ قابل پرداخت
                                    <span class="text-gray-400 text-xs">
                                        (تومان) 
                                    </span>
                                </th>
                                <th class="px-6 py-3 text-left font-bold">
                                    {{ $order->getTotal() }}
                                </th>
                            </tr>
                        @endif
                    </table> 
                </table>
            </div>
            
        </div>
    </div>
</section>
<!-- /Cart -->

</div>
@endsection

@push('scripts')
<script>
   window.addEventListener('load', (event) => {
    this.print();
   });
</script>
@endpush
