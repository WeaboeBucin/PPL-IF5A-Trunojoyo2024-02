@extends('User.Layouts.Master')
@section('title', 'Merchant')
@section('content')
    <section class="w-full pt-20 ">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Merchant List</span>
                    </div>
                </li>
            </ol>
        </div>
        <!-- ./breadcrumb -->

  

        <div class="container mx-auto py-8 px-8 lg:px-40" x-data="layoutData()">
            <form class="mb-4" id="filter-form" method="GET" action="{{ url()->current() }}">
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
        
            <div :class="layout === 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4' : 'flex flex-col gap-4'">

                @if($merchants)
                @foreach($merchants as $merchant)
                <div :class="layout === 'grid' ? 'dark:bg-gray-600 bg-white border border-gray-200 dark:border-gray-700 rounded-lg shadow-md p-4 hover:translate-y-[-5px] transition-transform duration-300 relative' : 'flex items-center p-4 h-40 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-700 rounded-lg shadow-md'">
                    <div class="relative">
                        <img  src="{{ asset('storage/' . $merchant->cover) }}"  :class="layout === 'grid' ? ' w-full rounded-lg mb-4' :'max-w-32 h-32 lg:h-28 lg:w-28 w-32 rounded-lg '">
                        <div :class=" layout === 'grid' ? 'absolute bottom-0 right-0 mb-2 mr-2 w-10 h-10' : 'absolute bottom-0 right-0 mb-2 mr-2 w-12 h-12 lg:block hidden'">
                            <img src="{{ asset('storage/' . $merchant->logo) }}"  class="rounded-full border-2 border-white shadow-md ">
                        </div>
                    </div>
                    <div :class="layout === 'list' ? 'ml-4' : ''">
                        <h2 :class="layout === 'grid' ? 'dark:text-white text-lg font-medium' : 'dark:text-white text-sm font-medium' ">{{$merchant->name}}</h2>
                        <a target="_blank" href="https://www.google.com/maps/search/{{$merchant->address}}" :class="layout === 'grid' ? 'font-sm text-sm text-blue-600 dark:text-blue-500 hover:underline' : 'font-xs text-xs text-blue-600 dark:text-blue-500 hover:underline'">{{$merchant->address}}</a>
                        <p class="dark:text-white mb-3 text-xs line-clamp-2 hover:line-clamp-none">{{$merchant->description}}</p>
                        <a href="{{route('merch-info',$merchant->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            More
                            <svg class="rtl:rotate-180 w-3 h-3 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            {{$merchants->appends($_GET)->onEachSide(1)->links('Pages.Pagination')}}
        </div>
        
        <!-- Tambahkan script Alpine.js -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.2.2/cdn.min.js" integrity="sha512-oHv8w2mpVQjAwKXjzI+cKqdr1jmxPA1ELvOlE/pM2pUzMo9TKZ6nXhzMAmMcZ1T4sy5roJYZX6cNi7O2A00JDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </section>

@endsection
