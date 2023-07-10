@extends('dashboard.layouts.base')
@section('title')
    لیست پیام کاربران
@endsection

@section('content')
<x-dashboard.main title="لیست پیام کاربران">
    <x-slot name="header"></x-slot>
    <x-slot name="append"></x-slot>
    <x-dashboard.card title="لیست پیام کاربران">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام و نام خانوادگی
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تلفن همراه
                    </th>
                    <th scope="col" class="px-6 py-3">
                        متن کامل پیام
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تاریخ ارسال
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $message->fullname }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $message->mobile }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $message->message }}
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-3">
                            @livewire('handle-status', [
                                'entity' => $message
                            ])
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-dashboard.card>
</x-dashboard.main>
@endsection
