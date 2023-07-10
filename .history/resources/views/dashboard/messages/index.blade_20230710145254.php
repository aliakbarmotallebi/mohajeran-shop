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
                            <form method="POST" action="{{ route('dashboard.messages.destroy', $message) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="ml-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z"/></svg>
                                </button>
                            </form>
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
