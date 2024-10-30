@extends('Merchant.Layouts.Master')

@section('content')
    <div class="min-h-screen p-4 sm:ml-64">
        <div class="mt-14 rounded-lg p-4">
            <nav class="mb-4 flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-3">
                    <li class="inline-flex items-center">
                        <a class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
                            href="{{ route('merchant.index') }}">
                            <ion-icon class="me-2.5 h-4 w-4" name="home"></ion-icon>
                            Dashboard
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="mx-1 w-3 text-gray-400 rtl:rotate-180">|</i>
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Edit
                                Lokasi</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="container">
                <form action="{{ route('merchant.storeLocation',$merchant->id) }}" method="POST">
                    @csrf
            
                    <!-- Other form inputs -->
            
                    <div class="max-w-[300px] mb-4 ">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="latitude" name="latitude" readonly>
                    </div>
            
                    <div class="max-w-[300px] mb-4 ">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="longitude" name="longitude" readonly>
                    </div>
            
                    <div id="map" class="z-1 h-screen w-[300px] lg:h-[600px] lg:w-[900px]"></div>
            
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-8">Submit</button>
                </form>
            </div>


        </div>
    </div>

@endsection
@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    const map = L.map('map').setView([{{ $merchant->latitude }}, {{ $merchant->longitude }}], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

let marker = L.marker([{{ $merchant->latitude }}, {{ $merchant->longitude }}], {draggable: true}).addTo(map);

marker.on('dragend', function (e) {
    const lat = marker.getLatLng().lat;
    const lng = marker.getLatLng().lng;
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
});

map.on('click', function (e) {
    marker.setLatLng(e.latlng);
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
});
</script>
@endsection