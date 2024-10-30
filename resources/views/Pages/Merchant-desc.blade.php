@extends('User.Layouts.Master')
@section('title', 'Postingan detail')
@section('content')
    <section class="w-full pt-20">
        <!-- breadcrumb -->
        <div class="container py-4 flex items-center gap-3 ps-10 lg:ps-20 dark:bg-gray-700">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-dark-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('merch-list') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-dark-600 dark:text-gray-400 dark:hover:text-white">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            Merchant List
                        </div>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Merchant info</span>
                    </div>
                </li>
            </ol>
        </div>
        <!-- ./breadcrumb -->
        <div class="container pb-8">
            <div class="w-full px-2 lg:px-40">
                <div class="mt-14 rounded-lg p-4">
                    <div
                        class="max-w-xl lg:max-w-4xl mx-auto p-5 rounded-lg  bg-white items-center md:items-start space-y-1 md:space-x-4">
                        <img src="{{ asset('storage/' . $merchant_detail->cover) }}" alt="Cover Toko" class="w-full rounded-lg mb-4">
                        <div class="p-4 flex flex-col lg:flex-row space-y-2 lg:space-x-5 lg:ml-6">
                            <img src="{{ asset('storage/' . $merchant_detail->logo) }}" alt="Business Logo"
                                class=" object-cover items-end rounded-lg size-20">
                            <div class="flex-grow-0 lg:bg-white sm:bg-blur-600">
                                <div class="space-x-2">
                                    <h2 class="text-xl font-bold">{{ $merchant_detail->name }}</h2>
                                    <p class="text-sm">{{ $merchant_detail->address }}</p>
                                </div>

                            </div>

                            <div class="flex  items-center md:space-x-5 mt-4 md:mt-0 ">
                                <div class="flex items-center space-x-1 gap-1 lg:ml-10">
                                
                                    <button onclick="openModal()"
                                    class=" px-2 py-2 rounded-lg text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                    Location
                                    </button>
                                </div>
                                <div class="border-l border-zinc-300 h-6 mx-2 md:mx-4"></div>
                                <div class="text-zinc-600 lg:text-base text-xs">{{ $merchant_detail->email }}</div>
                            </div>
                            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed  top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full mt-20 ms-0 lg:ms-40">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Merchant Location: {{ $merchant_detail->name }}
                                            </h3>
                                            <button type="button" onclick="closeModal()"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div id="map" class="w-full h-80"></div> <!-- Adjust height as needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="max-w-4xl mx-auto p-5 mt-10 rounded-lg  bg-white items-center md:items-start space-y-1 md:space-x-4">
                        <div class="grid grid-cols-1 sm:grid-cols-5 md:grid-cols-8 lg:grid-cols-4 gap-6">
                            @foreach ($products_paginate as $product)
                                <div
                                    class="bg-white border border-gray-200 rounded-lg shadow-md p-4 hover:translate-y-[-5px] transition-transform duration-300 relative">
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Image"
                                            class="w-full rounded-lg mb-4">
                                    </div>
                                    <h2 class="text-purple-800 text-lg font-medium">{{ $product->name }}</h2>
                                    <p class="text-gray-500 mb-3 text-xs">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <a href="{{ route('post-product-detail', $product->id) }}"
                                        class="bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-500 transition-colors duration-300 text-sm">View</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $products_paginate->onEachSide(0)->links('Pages.Pagination') }}
                        </div>

                    </div>

                    <div
                        class="max-w-4xl mx-auto p-5 mt-10 rounded-lg  bg-white items-center md:items-start space-y-1 md:space-x-4">
                        <h3 class="font-bold">Deskripsi {{ $merchant_detail->name }}</h3>
                        <p>{{ $merchant_detail->description }}</p>
                    </div>

                </div>

            </div>
        </div>
    </section>


@endsection


@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    let map = null;

    function openModal() {
        const modal = document.getElementById('default-modal');
        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
        initMap();
    }

    function closeModal() {
        const modal = document.getElementById('default-modal');
        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        map = null; // Reset map when modal is closed
    }

    function initMap() {
        if (!map) {
            map = L.map('map').setView([{{ $merchant_detail->latitude }}, {{ $merchant_detail->longitude }}], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            L.marker([{{ $merchant_detail->latitude }}, {{ $merchant_detail->longitude }}]).addTo(map);
        }
    }
</script>
@endsection
