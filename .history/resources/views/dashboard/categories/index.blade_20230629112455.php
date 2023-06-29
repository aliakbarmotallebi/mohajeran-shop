@extends('dashboard.layouts.base')
@section('title')
    لیست دسته بندی ها
@endsection

@section('content')
<x-dashboard.main title="لیست دسته بندی ها">
    <x-slot name="header"></x-slot>
    <x-slot name="append"></x-slot>
    <x-dashboard.card title="لیست دسته بندی ها">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-center text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ERO_CODE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام دسته بندی
                    </th>
                    <th scope="col" class="px-6 py-3">
                        فروشنده
                    </th>
                                            <th scope="col" class="px-6 py-3">
                        ساعت کاری
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                        {{ $category->erp_code }}
                    </th>
                    <td class="px-6 py-4 text-center">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap">
                        @if($category->is_vendor)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">
                                فروشنده شهروند
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center  whitespace-nowrap">
                        {{ $category->time }}
                    </td>
                    <td class="px-6 py-4 text-center  whitespace-nowrap">
                        {{ $category->owner->name ?? null }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-end gap-3">
                            @livewire('handle-status', [
                                'entity' => $category
                            ])
                            @if($category->image)
                            <a href="{{ asset($category->image) }}" target="_blank" class="ml-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4.828 21l-.02.02-.021-.02H2.992A.993.993 0 0 1 2 20.007V3.993A1 1 0 0 1 2.992 3h18.016c.548 0 .992.445.992.993v16.014a1 1 0 0 1-.992.993H4.828zM20 15V5H4v14L14 9l6 6zm0 2.828l-6-6L6.828 19H20v-1.172zM8 11a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
                            </a>
                            @endif
                            <a href="{{ route('dashboard.categories.edit', $category) }}" target="_blank" class="ml-1 flex items-center p-2 text-xs font-medium text-gray-700 bg-white rounded-lg border border-gray-200 toggle-dark-state-example hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                            </a>
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
