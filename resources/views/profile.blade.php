@extends('layouts.base')


@section('content')
<div class="flex h-screen">
    <x-sidebar />

    <div class="p-4 w-full md:px-8">
        <div class="md:flex md:-mx-2 ">
            <div class="w-full h-64">

                <div class="bg-white shadow-sm rounded-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-3 flex items-center space-x-4 border-b">
                        <div class="w-14 h-14 bg-blue-200 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="px-3">
                            <h2 class="text-xl font-bold text-gray-800">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </h2>
                            <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <!-- Profile Details Grid -->
                    <div class="p-6">
                        <div class="grid md:grid-cols-3 gap-4 text-sm mx-4">
                            <!-- Organisation -->
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500"
                                    viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M14.75 5a1.5 1.5 0 0 0-1.5-1.5H9.288a1 1 0 0 0-1 1v1H4.75a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h10zm0 3.5h4.5a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-4.5zm0 4h2.5m-2.5 4h2.5">
                                        </path>
                                        <circle cx="6.75" cy="9.5" r="1" fill="currentColor"></circle>
                                        <circle cx="6.75" cy="13" r="1" fill="currentColor"></circle>
                                        <circle cx="6.75" cy="16.5" r="1" fill="currentColor"></circle>
                                        <circle cx="10.75" cy="9.5" r="1" fill="currentColor"></circle>
                                        <circle cx="10.75" cy="13" r="1" fill="currentColor"></circle>
                                        <circle cx="10.75" cy="16.5" r="1" fill="currentColor"></circle>
                                    </g>
                                </svg>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-600">{{ __("Organization") }}</div>
                                    <div class="text-gray-800">{{ auth()->user()->name }}</div>
                                </div>
                            </div>

                            <!-- First Name -->
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5">
                                        <path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0"></path>
                                        <path
                                            d="M14.5 9.25a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0M17 19.5c-.317-6.187-9.683-6.187-10 0">
                                        </path>
                                    </g>
                                </svg>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-600">{{ __("Full name") }}</div>
                                    <div class="text-gray-800">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
                                </div>
                            </div>
                            <!-- Phone -->
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" width="32"
                                    height="32" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M8.14 15.733c2.158 2.158 4.278 3.28 5.89 3.864c1.768.64 3.606-.117 4.935-1.446l.459-.458a1.5 1.5 0 0 0 0-2.122l-1.149-1.149a1.5 1.5 0 0 0-2.121 0l-.387.387a2 2 0 0 1-2.828 0l-3.713-3.712a2 2 0 0 1 0-2.829l.387-.387a1.5 1.5 0 0 0 0-2.12l-1.15-1.15a1.5 1.5 0 0 0-2.12 0l-.572.572c-1.262 1.262-2.013 2.99-1.438 4.68c.538 1.58 1.622 3.685 3.806 5.87Z">
                                    </path>
                                </svg>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-600">{{ __("Phone") }}</div>
                                    <div class="text-gray-800">{{ auth()->user()->phone ?? "__" }}</div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5">
                                        <path
                                            d="M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181c5.181 5.116.056 12.196-4.773 15.64">
                                        </path>
                                        <path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4"></path>
                                    </g>
                                </svg>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-600">{{ __("Address") }}</div>
                                    <div class="text-gray-800">__</div>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="flex items-center gap-3">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M14.232 9.747a6 6 0 1 0-8.465 8.506a6 6 0 0 0 8.465-8.506m0 0L20 4m0 0h-4m4 0v4">
                                    </path>
                                </svg>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-600">{{ __("Gender") }}</div>
                                    <div class="text-gray-800">__</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                        <rect width="18.5" height="15.5" x="2.75" y="4.25" rx="3"></rect>
                                        <path d="m2.75 8l8.415 3.866a2 2 0 0 0 1.67 0L21.25 8"></path>
                                    </g>
                                </svg>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-600">{{ __("Email") }}</div>
                                    <a href="mailto:{{ auth()->user()->email }}" class="text-blue-600 hover:underline">
                                        {{ auth()->user()->email }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>
                <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-200">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-600 w-8 h-8" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5">
                                <path
                                    d="m11 10.242l1.034 1.181c.095.109.266.1.35-.016l2.1-2.907M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3">
                                </path>
                                <path
                                    d="M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3">
                                </path>
                            </g>
                        </svg>
                        <h2 class="text-md font-semibold px-3 text-gray-800">{{ __("Latest Orders") }}</h2>
                    </div>

                    <!-- Desktop Table -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-100 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        {{ __("Order ID") }}
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                       {{ __("Total") }}
                                    </th>
                                    <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        {{ __("Product") }}
                                    </th>
                                    {{-- <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        {{ __("State") }}
                                    </th> --}}
                                    <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        {{ __("Sended at") }}
                                    </th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($orders as $order)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium text-gray-900">{{ $order->id }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-sm text-gray-700 font-semibold">{{ $order->total_amount }} {{ app('site')->currency }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $order?->orderItems?->count() }} {{ __("Product") }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                           {{ $order->created_at->locale(app()->getLocale())->translatedFormat('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="https://www.intercocina.com/order/INTER-0oW4TDGi2bkzDFh"
                                                class="text-blue-600 hover:text-blue-900 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                    <!-- Mobile Card View -->
                    <div class="md:hidden">
                        <div class="bg-white border-b hover:bg-gray-50 transition-colors duration-200 p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-gray-900">INTER-0oW4TDGi2bkzDFh</span>
                                <span class="text-sm text-gray-700">26 Dec 2024</span>
                            </div>

                            <div class="flex justify-between items-center mb-2">
                                <span class="text-base font-bold text-gray-800">5744.51 MAD</span>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    11 articles
                                </span>
                            </div>

                            <div class="flex justify-between items-center text-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 text-nowrap rounded-full text-xs font-semibold
                                                                                bg-red-100 text-red-800
                                                                                    bg-gray-100 text-gray-800
                                                                    ">
                                    Annulé
                                </span>
                                <a href="https://www.intercocina.com/order/INTER-0oW4TDGi2bkzDFh"
                                    class="text-blue-600 hover:text-blue-900 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
