@extends('layouts.base')

@section('content')
<div class="min-h-screen md:py-8 md:px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        {{-- Product --}}
        <div class="bg-white md:rounded-xl md:shadow-sm py-2 px-0 md:p-6 lg:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 md:gap-8">

                {{-- Product Images --}}
                <div class="w-full md:sticky top-5">
                    <div class="rounded-lg overflow-hidden">
                        <x-product-showcase :images="$product->images" :name="$product->name" />
                    </div>
                </div>

                {{-- Product Details (Livewire) --}}
                @livewire('view-product', ['product' => $product], key('product-'.$product->id))

            </div>
        </div>

        {{-- Product Description & Options --}}
        @if(!empty($product->content) || (!empty($product->options) && is_iterable($product->options)))
        <div class="bg-white rounded-xl shadow-sm border p-4 sm:p-6 lg:p-8 mt-6">

            <h2 class="text-2xl mb-4 font-semibold">
                {{ __("Product description") }}
            </h2>

            <div
                class="{{ !empty($product->content) && !empty($product->options) ? 'grid grid-cols-1 lg:grid-cols-2 gap-8' : '' }}">

                {{-- Description --}}
                @if(!empty($product->content))
                <div class="space-y-6">
                    {!! $product->content !!}
                </div>
                @endif

                {{-- Options Table --}}
                @if(!empty($product->options) && is_iterable($product->options))
                <div class="w-full">
                    <table class="w-full text-sm text-left rtl:text-right border border-gray-200">
                        <tbody>
                            @foreach($product->options as $key => $value)
                            <tr class="border-b font-semibold hover:bg-gray-50 transition duration-300">
                                <th class="px-6 py-4 text-gray-900 whitespace-nowrap">
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
                @endif

            </div>

            {{-- Mobile Buy Button --}}
            <a href="#buy-now" class="btn btn-primary w-full rounded-md lg:hidden mt-6">
                <span wire:loading class="inline-flex items-center">
                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                </span>
                {{ __("Buy Now") }}
            </a>

        </div>
        @endif

    </div>
</div>

<x-feature />
@endsection
