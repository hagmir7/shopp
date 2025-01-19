@extends('layouts.base')

@section('content')
<div class="min-h-screen md:py-8 md:px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        {{-- Product  --}}
        <div class="bg-white md:rounded-xl md:shadow-sm border p-4 sm:p-6 lg:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="w-full">
                    <div class="rounded-lg overflow-hidden">
                        <x-product-showcase :images="$product->images" />
                    </div>
                </div>
                @livewire('view-product', ['product' => $product], key($product->id))
            </div>
        </div>
        {{-- Mobile buy now form --}}
        <div id="buy-now" class="bg-white rounded-xl shadow-sm border p-4 sm:p-6 lg:p-8 mt-6 md:hidden">
            <h2 class="text-2xl mb-3 font-black">{{ __("Please enter your information to complete the order.") }}</h2>
            @livewire('buy-now', ['product' => $product], key($product->id))
        </div>
        {{-- Product Description and Options --}}
        <div class="bg-white rounded-xl shadow-sm border p-4 sm:p-6 lg:p-8 mt-6">
            <h2 class="text-2xl mb-3">{{ __("Product description") }}</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 ">
                <div class="flex flex-col space-y-6">
                    {!! $product->content !!}
                </div>
                <div class="w-full">
                    <table class="w-full text-sm text-left rtl:text-right border-2">
                        <tbody>
                            @foreach ($product->options as $key => $value)
                            <tr class="border-b-2 font-semibold hover:bg-gray-50 duration-500">
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                    {{ $key }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $value }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
<x-feature />
@endsection
