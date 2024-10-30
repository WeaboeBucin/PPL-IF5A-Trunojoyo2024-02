@extends('Merchant.Layouts.Master')
@section('title', 'Dashboard Merchant')
@section('content')

<section class="w-full">
    <div class="min-h-screen p-4 sm:ml-64">
        <div class="mt-14 rounded-lg p-4">
            <div class="max-w-4xl mx-auto p-5 rounded-lg bg-white dark:bg-gray-700 items-center md:items-start space-y-1 md:space-x-4">
                <img src="{{ asset('storage/'.  $merchant_detail->cover ) }}" alt="Cover Toko" class="w-full rounded-lg mb-4">
                <div class="p-4 flex space-x-5 ml-6">
                    <img src="{{ asset('storage/'.  $merchant_detail->logo ) }}" alt="Business Logo" class=" object-cover items-end rounded-lg size-20">
                    <div class="flex-grow-0 bg-white dark:text-white dark:bg-gray-700 sm:bg-blur-600 ">
                        <div class="space-x-2">
                            <h2 class="text-xl font-bold">{{ $merchant_detail->name }}</h2>
                            <p>{{ $merchant_detail->address }}</p>
                        </div>
                        <button onclick="openModal()"
                            class="btn btn-primary px-4 py-2 rounded-lg text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            View Location
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
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

            <div class="max-w-4xl mx-auto p-5 mt-10 rounded-lg dark:bg-gray-700 bg-white items-center md:items-start space-y-1 md:space-x-4">
                <div class="grid grid-cols-1 sm:grid-cols-5 md:grid-cols-8 lg:grid-cols-4 gap-6">
                    @foreach ($products_paginate as $product)
                    <div class="bg-white border dark:bg-gray-600 dark:border-gray-700 dark:text-white border-gray-200 rounded-lg shadow-md p-4 hover:translate-y-[-5px] transition-transform duration-300 relative">
                        <div class="relative">
                            <img src="{{ asset('storage/'.  $product->photo ) }}" alt="Product Image" class="w-full rounded-lg mb-4">
                        </div>
                        <h2 class="text-lg font-medium">{{ $product->name }}</h2>
                        <p class="text-gray-500 dark:text-white mb-3 text-xs">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('post-product-detail', $product->id) }}"
                            class="bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-500 transition-colors duration-300 text-sm">View</a>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $products_paginate->onEachSide(0)->links('Pages.Pagination') }}
                </div>
            </div>

            <div class="max-w-4xl mx-auto p-5 mt-10 rounded-lg dark:bg-gray-700 bg-white items-center md:items-start space-y-1 md:space-x-4">
                <h3 class="font-bold">Deskripsi {{ $merchant_detail->name }}</h3>
                <p>{{ $merchant_detail->description }}</p>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
