<x-partial.modal title="شماره سفارش({{ $order->id ?? null }})" wire:model="show" class="!p-0">

    <table class="w-full text-sm text-left text-gray-500">
        <tbody>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 text-right">
                    ادرس
                </th>
                <td class="px-6 py-4 text-right whitespace-nowrap">
                    {{ $order->user->address ?? null }}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="px-3">
        <div class="overflow-hidden max-h-[518px]">
            <div class="overflow-x-auto overflow-y-auto  max-h-[446px]">

                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="sticky top-0 text-center text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                ردیف
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                نام کالا
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                بارکد محصول
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                قیمت واحد
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                تعداد
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                مبلغ پرداختی
                                <span class="text-gray-400 text-xs">
                                    (تومان)
                                </span>
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                توضیحات اضافی
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                عملیات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($items)
                            @foreach ($items as $item)
                                <tr class="bg-white border-b hover:bg-gray-100">
                                    <th class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </th>
                                    <th class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item->product->name ?? null }}
                                    </th>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        {{ $item->product->code ?? null }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        <span class="font-bold text-gray-800">
                                            {{ number_format($item->getPrice()) }}
                                        </span>
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        {{ $item->getQuantity() }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        {{ number_format($item->getPrice() * $item->getQuantity()) }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        {{ $item->comment }}
                                    </td>
                                    <td scope="row" class="px-6 py-4 text-center">
                                        @if (!$order->isCompleted() ?? false)
                                            <button wire:click="remove({{ $item->id }})"
                                                class="p-2 mr-2 text-sm font-bold text-red-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                <svg wire:loading wire:target="remove({{ $item->id }})"
                                                    class="animate-spin w-4 h-4 m-auto inset-0"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12"
                                                        r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor"
                                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                    </path>
                                                </svg>
                                                <svg wire:loading.class="hidden"
                                                    wire:target="remove({{ $item->id }})"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 m-auto inset-0"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6" />
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    <line x1="10" y1="11" x2="10" y2="17" />
                                                    <line x1="14" y1="11" x2="14" y2="17" />
                                                </svg>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-slot name="footer"></x-slot>
</x-partial.modal>
