@extends('User.Layouts.Master')
@section('title', 'Postingan Product')
@section('content')
    <div class="w-full pt-20 ">
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Postingan
                            product</span>
                    </div>
                </li>
            </ol>
        </div>
        <!-- ./breadcrumb -->

        <!-- shop wrapper -->
        <div class="container grid md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16 items-start px-8 lg:px-40">
            <!-- sidebar -->
            <!-- drawer init and toggle -->
            <div class="text-center md:hidden">
                <button
                    class="text-white bg-gray-400 hover:bg-gray-800 focus:ring-4 focus:ring-dark-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-dark-700 focus:outline-none dark:focus:ring-dark-800 block md:hidden"
                    type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                    aria-controls="drawer-example">
                    <ion-icon class="text-2xl" name="list"></ion-icon>
                </button>
            </div>

            <!-- drawer component -->
            <div id="drawer-example"
                class="fixed top-20 left-0 z-40 h-screen  p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-label">
                
                <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
           
                <div class="divide-y divide-gray-200 space-y-5">
                    <form id="filter-form" method="GET" action="{{ url()->current() }}"  onsubmit="updateUrlParameters(event)">
                        <div class="divide-y divide-gray-200 space-y-2">
                            <!-- Filter Kategori -->
                            <div>
                                <h3 class="text-xl dark:text-white my-3 uppercase font-medium">Categories</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="category[]" value="makanan" id="cat-1" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('makanan', request('category', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="cat-1" class="dark:text-white ml-3 cursor-pointer">Makanan</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(15)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="category[]" value="minuman" id="cat-2" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('minuman', request('category', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="cat-2" class="dark:text-white ml-3 cursor-pointer">Minuman</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(9)</div> --}}
                                    </div>
                                </div>
                            </div>
                
                            <!-- Filter Merchant -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Merchant</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="cafe" id="brand-1" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('cafe', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="brand-1" class="dark:text-white ml-3 cursor-pointer">Cafe</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(15)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="lapak_mahasiswa" id="brand-2" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('lapak_mahasiswa', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="brand-2" class="dark:text-white ml-3 cursor-pointer">Lapak Mahasiswa</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(9)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="pedagang_keliling" id="brand-3" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('pedagang_keliling', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="brand-3" class="dark:text-white ml-3 cursor-pointer">Pedagang Keliling</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(21)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="umkm" id="brand-4" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('umkm', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="brand-4" class="dark:text-white ml-3 cursor-pointer">UMKM</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(10)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="warung_makan" id="brand-5" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('warung_makan', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="brand-5" class="dark:text-white ml-3 cursor-pointer">Warung Makan</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(10)</div> --}}
                                    </div>
                                </div>
                            </div>
                
                            <!-- Filter Harga -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Harga</h3>
                                <div class="mt-4 flex items-center">
                                    <input type="text" name="min" id="min" value="{{ request('min') }}" class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm" placeholder="min" onchange="document.getElementById('filter-form').submit();">
                                    <span class="mx-3 text-gray-500">-</span>
                                    <input type="text" name="max" id="max" value="{{ request('max') }}" class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm" placeholder="max" onchange="document.getElementById('filter-form').submit();">
                                </div>
                            </div>
                
                            <!-- Filter Rating -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Rating</h3>
                                <div class="flex items-center gap-2">
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="1" id="size-xs" class="hidden" {{ request('rating') == '1' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="size-xs" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">1</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="2" id="size-sm" class="hidden" {{ request('rating') == '2' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="size-sm" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">2</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="3" id="size-m" class="hidden" {{ request('rating') == '3' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="size-m" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">3</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="4" id="size-l" class="hidden" {{ request('rating') == '4' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="size-l" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">4</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="5" id="size-xl" class="hidden" {{ request('rating') == '5' ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="size-xl" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">5</label>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Filter Ketersediaan -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Ketersediaan</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="availability[]" value="tersedia" id="tersedia" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('tersedia', request('availability', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="tersedia" class="dark:text-white ml-3 cursor-pointer">Tersedia</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(15)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="availability[]" value="habis" id="habis" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('habis', request('availability', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form').submit();">
                                        <label for="habis" class="dark:text-white ml-3 cursor-pointer">Habis</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(9)</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>

            <!-- ./sidebar -->
            <div class="col-span-1 bg-white dark:bg-gray-700 px-4 pb-6 shadow rounded overflow-hiddenb hidden md:block">
                <div class="divide-y divide-gray-200 space-y-5">
                    <form id="filter-form-desktop" method="GET" action="{{ url()->current() }}" onsubmit="updateUrlParameters(event)">
                        <div class="divide-y divide-gray-200 space-y-5">
                            <!-- Filter Kategori -->
                            <div>
                                <h3 class="text-xl dark:text-white my-3 uppercase font-medium">Categories</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="category[]" value="makanan" id="cat-1" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('makanan', request('category', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="cat-1" class="dark:text-white ml-3 cursor-pointer">Makanan</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(15)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="category[]" value="minuman" id="cat-2" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('minuman', request('category', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="cat-2" class="dark:text-white ml-3 cursor-pointer">Minuman</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(9)</div> --}}
                                    </div>
                                </div>
                            </div>
                
                            <!-- Filter Merchant -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Merchant</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="cafe" id="brand-1" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('cafe', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="brand-1" class="dark:text-white ml-3 cursor-pointer">Cafe</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(15)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="lapak_mahasiswa" id="brand-2" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('lapak_mahasiswa', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="brand-2" class="dark:text-white ml-3 cursor-pointer">Lapak Mahasiswa</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(9)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="pedagang_keliling" id="brand-3" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('pedagang_keliling', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="brand-3" class="dark:text-white ml-3 cursor-pointer">Pedagang Keliling</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(21)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="umkm" id="brand-4" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('umkm', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="brand-4" class="dark:text-white ml-3 cursor-pointer">UMKM</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(10)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="merchant[]" value="warung_makan" id="brand-5" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('warung_makan', request('merchant', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="brand-5" class="dark:text-white ml-3 cursor-pointer">Warung Makan</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(10)</div> --}}
                                    </div>
                                </div>
                            </div>
                
                            <!-- Filter Harga -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Harga</h3>
                                <div class="mt-4 flex items-center">
                                    <input type="text" name="min" id="min" value="{{ request('min') }}" class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm" placeholder="min" onchange="document.getElementById('filter-form-desktop').submit();">
                                    <span class="mx-3 text-gray-500">-</span>
                                    <input type="text" name="max" id="max" value="{{ request('max') }}" class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm" placeholder="max" onchange="document.getElementById('filter-form-desktop').submit();">
                                </div>
                            </div>
                
                            <!-- Filter Rating -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Rating</h3>
                                <div class="flex items-center gap-2">
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="1" id="size-xs" class="hidden" {{ request('rating') == '1' ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="size-xs" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">1</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="2" id="size-sm" class="hidden" {{ request('rating') == '2' ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="size-sm" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">2</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="3" id="size-m" class="hidden" {{ request('rating') == '3' ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="size-m" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">3</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="4" id="size-l" class="hidden" {{ request('rating') == '4' ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="size-l" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">4</label>
                                    </div>
                                    <div class="size-selector">
                                        <input type="radio" name="rating" value="5" id="size-xl" class="hidden" {{ request('rating') == '5' ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="size-xl" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm dark:text-white">5</label>
                                    </div>
                                </div>
                            </div>
                
                            <!-- Filter Ketersediaan -->
                            <div class="pt-4">
                                <h3 class="text-xl dark:text-white mb-3 uppercase font-medium">Ketersediaan</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="availability[]" value="tersedia" id="tersedia" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('tersedia', request('availability', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="tersedia" class="dark:text-white ml-3 cursor-pointer">Tersedia</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(15)</div> --}}
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="availability[]" value="habis" id="habis" class="focus:ring-0 rounded-sm cursor-pointer dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" {{ in_array('habis', request('availability', [])) ? 'checked' : '' }} onchange="document.getElementById('filter-form-desktop').submit();">
                                        <label for="habis" class="dark:text-white ml-3 cursor-pointer">Habis</label>
                                        {{-- <div class="ml-auto dark:text-white text-sm">(9)</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
           
            <div class="col-span-3 mb-12" x-data="layoutData()">
                <form class="w-full mb-6 mx-auto" method="GET" action="{{ url()->current() }}">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search . . ." required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
                
        
                <div class="flex justify-between mb-4">
                    <form id="sortForm" class="w-40px" method="GET" action="{{ url()->current() }}">
                        <select id="sort" name="sort" class="bg-gray-50 px-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="document.getElementById('sortForm').submit();">
                            <option class="py-2" value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                            <option class="py-2" value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                            <option class="py-2" value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                        </select>
                    </form>
                    
        
                    <div class="flex gap-2 ml-auto">
                        <div @click="setLayout('grid')" :class="{ 'bg-blue-700 text-white': layout === 'grid', 'dark:bg-gray-600 bg-white': layout !== 'grid' }" class="w-10 h-9 flex items-center justify-center rounded cursor-pointer">
                            <i class="fa-solid fa-grip-vertical"></i>
                        </div>
                        <div @click="setLayout('list')" :class="{ 'bg-blue-700 text-white': layout === 'list', 'dark:bg-gray-600 bg-white': layout !== 'list' }" class="border border-gray-300 w-10 h-9 flex items-center justify-center  rounded cursor-pointer">
                            <i class="fa-solid fa-list"></i>
                        </div>
                    </div>
                </div>
                
                <div :class="layout === 'grid' ? 'grid md:grid-cols-3 grid-cols-2 gap-6' : 'flex flex-col gap-4'">

                    @if($products->count() > 0)
                    @foreach ($products as $product)
                    <div :class="layout === 'grid' ? 'bg-white dark:bg-gray-600 shadow rounded overflow-hidden group' : 'flex items-center p-4 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-700 rounded-lg shadow-md'">
                        <div class="relative ">
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-24 lg:h-48 object-cover">
                            <div :class="layout === 'grid' ? 'absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition ' : 'inset-0 flex gap-2 mt-2'">
                                <a href="{{route('post-product-detail',$product->id)}}" class="text-white text-lg w-9 h-8 rounded-full bg-blue-600 flex items-center justify-center hover:bg-gray-800 transition" title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <form action="{{ route('add-fav') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="text-white text-lg w-9 h-8 rounded-full bg-blue-600 flex items-center justify-center hover:bg-gray-800 transition" title="add to wishlist">
                                        <i class="fa-solid fa-heart"></i>
                                    </button>
                                </form>                                
                            </div>
                        </div>
                        <div :class="layout === 'list' ? 'ml-4' : 'pt-5 pb-3 px-2 lg:px-4'">
                            <p >
                                @if ( $product-> status == 'tersedia') 
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{$product->status}}</span>
                                @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{$product->status}}</span>
                                @endif
                                <h4 class="uppercase dark:text-white font-bold text-sm lg:text-xl mb-2 text-gray-800 hover:text-blue-800 transition">{{$product->name}}</h4>
                            </p>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-base lg:text-xl dark:text-white font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
        
                            <div class="flex flex-col gap-2 mt-2 text-black dark:text-white">
                                <a target="_blank" class="flex items-center gap-2 font-medium" href="{{ route('merch-info', $product->merchant->id) }}">
                                    <p class="text-[10px] lg:text-xs font-light text-blue-800 dark:text-blue-300 lg:line-clamp-none line-clamp-2">{{$product->merchant->address}} </p>
                                </a>
                                <a href="{{ route('merch-info', $product->merchant->id) }}">
                                    <p class="text-[10px] lg:text-sm font-bold" >[ {{$product->merchant->type}} ]</p> <p class="text-xs">{{$product->merchant->name}} </p>
                                </a>
                            </div>
                            <div class="flex lg:items-center mt-2 flex-col lg:flex-row ">
                                
                                @php
                                    $rating = $product->rating; 
                                    $fullStars = floor($rating); 
                                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0; 
                                    $emptyStars = 5 - ($fullStars + $halfStar); 
                                @endphp
                                <div class="flex gap-1 text-sm text-yellow-400 ">
                                    @for ($i = 0; $i < $fullStars; $i++)
                                    <svg aria-hidden="true" class="w-3 lg:w-5 h-3 lg:h-5 text-yellow-400" fill="currentColor"
                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @endfor
                                    @if ($halfStar)
                                    <svg aria-hidden="true" class="w-3 lg:w-5 h-3 lg:h-5 text-yellow-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <clipPath id="half">
                                                <rect x="0" y="0" width="10" height="20" />
                                            </clipPath>
                                        </defs>
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            fill="currentColor"
                                            clip-path="url(#half)"/>
                                        <path fill='none'  stroke="currentColor" stroke-width="1" 
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    
                                    @endif
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                    <svg aria-hidden="true" class="w-3 lg:w-5 h-3 lg:h-5 text-yellow-400" fill="none" stroke="currentColor" stroke-width="1" 
                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    @endfor
                                </div>
                                <span class="m-0 lg:ml-1 text-gray-500 dark:text-gray-400">{{$product->rating}}</span>
                                <div class="text-xs text-gray-500 m-0 lg:ml-3">{{$product['getReview']->count()}} Review</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h4 class="text-lg w-full text-center">There are no products.</h4>
            @endif
                    
        



                </div>
           

                
                    {{$products->appends($_GET)->onEachSide(1)->links('Pages.Pagination')}}
                
            
            <!-- ./products -->
        </div>

       
    </div>
@endsection
