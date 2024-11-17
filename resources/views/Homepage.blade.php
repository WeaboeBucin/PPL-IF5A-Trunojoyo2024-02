@extends('User.Layouts.Master')
@section('title', 'Homepage')
@section('content')
    <div class="w-full ">
        <section class="hero overflow-hidden">

            <div class=" pb-[110px] pt-[120px] z-10 lg:pt-[150px] bg-cover"
                style="background-image: url('assets/img/heros/bgr-hero2.png')">

                <div class="container  mx-auto">

                    <div class="mx-6 lg:mx-20 flex flex-wrap items-center">
                        <div class="w-full px-4 lg:w-5/12">
                            <div class="hero-content ">

                                @if (Auth::guard('user')->check())
                                <a @disabled(true) href="{{ route('home') }}" class="z-12 text-white bg-[#2196F3] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center md:inline-flex items-center dark:bg-blue-600 dark:hover:bg-[#2196F3] dark:focus:ring-blue-800"
                                    >Hi {{ Auth::guard('user')->user()->first_name }} </a>

                                @elseif (Auth::guard('merchant')->check())
                                    <a @disabled(true) href="{{ route('home') }}" class="z-12 text-white bg-[#2196F3] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center md:inline-flex items-center dark:bg-blue-600 dark:hover:bg-[#2196F3] dark:focus:ring-blue-800"
                                    >{{ Auth::guard('merchant')->user()->owner }}  </a>

                                @else
                                <a href="{{ route('login') }}"
                                    class="inline-block rounded-md border border-transparent bg-[#2196F3] px-7 py-3 text-base font-medium text-white transition hover:bg-opacity-90 mt-96">
                                    Get Started now
                                </a>
                                @endif
                              

                            </div>
                        </div>
                        <div class="hidden px-4 lg:block lg:w-1/12"></div>
                        <div class="w-full px-4 lg:w-6/12 min-h-96">
                            <div class="lg:ml-auto lg:text-right">
                                <div class="relative z-3 inline-block pt-11 lg:pt-0">
                                    <span class="absolute m-bottom-8 m-right-8 ">
                                        <svg width="93" height="93" viewBox="0 0 93 93" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2.5" cy="2.5" r="2.5" fill="#2196F3" />
                                            <circle cx="2.5" cy="24.5" r="2.5" fill="#2196F3" />
                                            <circle cx="2.5" cy="46.5" r="2.5" fill="#2196F3" />
                                            <circle cx="2.5" cy="68.5" r="2.5" fill="#2196F3" />
                                            <circle cx="2.5" cy="90.5" r="2.5" fill="#2196F3" />
                                            <circle cx="24.5" cy="2.5" r="2.5" fill="#2196F3" />
                                            <circle cx="24.5" cy="24.5" r="2.5" fill="#2196F3" />
                                            <circle cx="24.5" cy="46.5" r="2.5" fill="#2196F3" />
                                            <circle cx="24.5" cy="68.5" r="2.5" fill="#2196F3" />
                                            <circle cx="24.5" cy="90.5" r="2.5" fill="#2196F3" />
                                            <circle cx="46.5" cy="2.5" r="2.5" fill="#2196F3" />
                                            <circle cx="46.5" cy="24.5" r="2.5" fill="#2196F3" />
                                            <circle cx="46.5" cy="46.5" r="2.5" fill="#2196F3" />
                                            <circle cx="46.5" cy="68.5" r="2.5" fill="#2196F3" />
                                            <circle cx="46.5" cy="90.5" r="2.5" fill="#2196F3" />
                                            <circle cx="68.5" cy="2.5" r="2.5" fill="#2196F3" />
                                            <circle cx="68.5" cy="24.5" r="2.5" fill="#2196F3" />
                                            <circle cx="68.5" cy="46.5" r="2.5" fill="#2196F3" />
                                            <circle cx="68.5" cy="68.5" r="2.5" fill="#2196F3" />
                                            <circle cx="68.5" cy="90.5" r="2.5" fill="#2196F3" />
                                            <circle cx="90.5" cy="2.5" r="2.5" fill="#2196F3" />
                                            <circle cx="90.5" cy="24.5" r="2.5" fill="#2196F3" />
                                            <circle cx="90.5" cy="46.5" r="2.5" fill="#2196F3" />
                                            <circle cx="90.5" cy="68.5" r="2.5" fill="#2196F3" />
                                            <circle cx="90.5" cy="90.5" r="2.5" fill="#2196F3" />   
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="mt-5 lg:mt-[-210px] w-full z-2 absolute ">
                    <svg class="dark:fill-gray-500 fill-gray-200" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1440 320">
                        <path f fill-opacity="1"
                            d="M0,224L48,240C96,256,192,288,288,293.3C384,299,480,277,576,266.7C672,256,768,256,864,245.3C960,235,1056,213,1152,218.7C1248,224,1344,256,1392,272L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                </div> --}}
        </section>

        <section class="pb-12 pt-20 lg:pb-[90px] lg:pt-[120px] dark:bg-dark">
            <div class="container mx-auto">
                <div class=" flex flex-wrap">
                    <div class="w-full">
                        <div class="w-full mb-12  text-center lg:mb-20 bg-gray-300 bg-opacity-50 p-3 py-6">
                            <span class="mb-2 block text-lg font-semibold text-black dark:text-gray-800">
                                Periksa
                            </span>
                            <h2
                                class="mb-3 text-3xl font-bold leading-[1.2] text-dark sm:text-4xl md:text-[40px] dark:text-white">
                                Kategori Produk
                            </h2>
                            <p class="text-base text-black dark:text-gray-800">
                                Dibawah ini beberapa kategori produk yang tersedia , cek sekarang
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mx-auto lg:w-[70%] w-[90%] flex flex-wrap justify-center">

                    {{-- Fashion --}}
                    @if ($categories)
                        @foreach ($categories as $category)
                        <div class="w-full px-4 md:w-1/4 lg:w-1/5">
                            <div class="mb-6 rounded-sm bg-white shadow-2 hover:shadow-lg dark:bg-gray-600">
                                <div class="mb-2 flex items-center justify-center bg-white-300 dark:bg-gray-700">
                                    <img src="/assets/img/category/{{ $category->name }}.jpg" alt="{{ $category->name }}" class="w-full h-36 object-cover">
                                </div>
                                <div class="p-4">
                                    <a href="postingan?category%5B%5D={{ strtolower(strtok($category->name, ' ')) }}&min=&max="
                                        class="mb-[14px] text-2xl font-semibold text-dark dark:text-white flex flex-col truncate ">
                                        {{ $category->name }}
                                    </a>
                                    <p class="text-body-color hover:text-pretty dark:text-white mb-8 text-start truncate hover:text-clip">
                                        Daftar Produk berdasarkan <br> Kategori {{ $category->name }}
                                    </p>
                                    <div class="flex flex-col gap-2 text-black dark:text-white">
                                        <p class="flex flex-row font-medium">
                                            <p class="text-xs text-blue-800 dark:text-blue-300">
                                        </p>    
                                        <a href="postingan?category%5B%5D={{ strtolower(strtok($category->name, ' ')) }}&min=&max=" class="flex">
                                            <button class="hidden text-white bg-[#2196F3] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-[#2196F3] font-medium rounded-lg text-sm px-5 py-2.5 text-center md:inline-flex items-center dark:bg-[#2196F3] dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Jelajahi
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>                   
                        @endforeach
                    @endif

                </div>
            </div>
        </section>

        <section class="dark:bg-gray-400 bg-gray-300 overflow-hidden bg-tg-bg pb-20 pt-20 lg:pb-[120px] lg:pt-[120px]">
            <div class="container mx-auto">
                <div class="mx-4 flex flex-wrap">
                    <div class="w-full px-4 ">
                        <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
                            <span class="mb-2 block text-lg font-semibold dark:text-gray-800">
                                Periksa
                            </span>
                            <h2
                                class="mb-3 text-3xl font-bold leading-[1.2] text-dark dark:text-white sm:text-4xl md:text-[40px]">
                                Produk Unggulan
                            </h2>
                            <p class="dark:text-gray-800">
                                Anda bisa melihat produk unggulan!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="sm:mx-8 lg:mx-40 flex flex-wrap justify-center">

                    @if ($featured)
                        @foreach ($featured as $item)
                            <div class="w-full px-4 md:w-1/2 lg:w-1/3 ">
                                <div class="mb-6 rounded-sm bg-white  shadow-2 hover:shadow-lg  dark:bg-gray-600">
                                    <div class="mb-2 flex items-center justify-center  bg-white-300 dark:bg-gray-700">
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">

                                    </div>
                                    <div class="p-4">
                                        <a href="{{route('post-product-detail',$item->id)}}"
                                            class="mb-[14px] text-2xl font-semibold text-dark dark:text-white flex flex-col">
                                                {{ $item->name }} 
                                                
                                                <span class="text-lg font-bold ">Rp
                                                {{ number_format($item->price, 0, ',', '.') }}</span>
                                        </a>
                                        <p
                                            class="text-body-color hover:text-pretty dark:text-white mb-8 text-start truncate hover:text-clip">
                                            {{ $item->description }}
                                        </p>
                                        <div class="flex flex-col gap-2 text-black dark:text-white">
                                            <p class="flex flex-row font-medium " href="">
                                                <p class="text-xs text-blue-800 dark:text-blue-300">
                                                    {{ $item->merchant->address }} </p>
                                            </p>
                                            <p href="" class="flex">
                                                <svg class="size-6 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <g>
                                                        <path fill="none" d="M0 0h24v24H0z"/>
                                                        <path d="M21 11.646V21a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9.354A3.985 3.985 0 0 1 2 9V3a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v6c0 1.014-.378 1.94-1 2.646zm-2 1.228a4.007 4.007 0 0 1-4-1.228A3.99 3.99 0 0 1 12 13a3.99 3.99 0 0 1-3-1.354 3.99 3.99 0 0 1-4 1.228V20h14v-7.126zM14 9a1 1 0 0 1 2 0 2 2 0 1 0 4 0V4H4v5a2 2 0 1 0 4 0 1 1 0 1 1 2 0 2 2 0 1 0 4 0z"/>
                                                    </g>
                                                </svg>
                                                {{ $item->merchant->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </section>
       
        <section class="pb-12 pt-20 lg:pb-[90px] lg:pt-[120px] dark:bg-dark">
            <div class="container mx-auto">
                <div class=" flex flex-wrap">
                    <div class="w-full">
                        <div class="w-full mb-12  text-center lg:mb-20 bg-gray-300 bg-opacity-50 p-3 py-6">
                            <span class="mb-2 block text-lg font-semibold text-black dark:text-gray-800">
                                Periksa
                            </span>
                            <h2
                                class="mb-3 text-3xl font-bold leading-[1.2] text-dark sm:text-4xl md:text-[40px] dark:text-white">
                                Postingan terbaru
                            </h2>
                            <p class="text-base text-black dark:text-gray-800">
                                Dibawah ini beberapa postingan terbaru yang telah di posting oleh merchant , cek sekarang
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mx-auto lg:w-[70%] w-[90%] flex flex-wrap">
                    @if ($featured)
                        @foreach ($featured as $item)
                            <div class="w-full px-4 md:w-1/2 lg:w-1/3 ">
                                <div class="mb-6 rounded-sm bg-white  shadow-2 hover:shadow-lg  dark:bg-gray-600">
                                    <div class="mb-2 flex items-center justify-center  bg-white-300 dark:bg-gray-700">
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">

                                    </div>
                                    <div class="p-4">
                                        <a href="{{route('post-product-detail',$item->id)}}"
                                            class="mb-[14px] text-2xl font-semibold text-dark dark:text-white flex flex-col">
                                                {{ $item->name }} 
                                                
                                                <span class="text-lg font-bold ">Rp
                                                {{ number_format($item->price, 0, ',', '.') }}</span>
                                        </a>
                                        <p
                                            class="text-body-color hover:text-pretty dark:text-white mb-8 text-start truncate hover:text-clip">
                                            {{ $item->description }}
                                        </p>
                                        <div class="flex flex-col gap-2 text-black dark:text-white">
                                            <p class="flex flex-row font-medium " href="">
                                                <p class="text-xs text-blue-800 dark:text-blue-300">
                                                    {{ $item->merchant->address }} </p>
                                            </p>
                                            <p href="" class="flex">
                                                <svg class="size-6 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <g>
                                                        <path fill="none" d="M0 0h24v24H0z"/>
                                                        <path d="M21 11.646V21a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9.354A3.985 3.985 0 0 1 2 9V3a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v6c0 1.014-.378 1.94-1 2.646zm-2 1.228a4.007 4.007 0 0 1-4-1.228A3.99 3.99 0 0 1 12 13a3.99 3.99 0 0 1-3-1.354 3.99 3.99 0 0 1-4 1.228V20h14v-7.126zM14 9a1 1 0 0 1 2 0 2 2 0 1 0 4 0V4H4v5a2 2 0 1 0 4 0 1 1 0 1 1 2 0 2 2 0 1 0 4 0z"/>
                                                    </g>
                                                </svg>
                                                {{ $item->merchant->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>

        

        <section class="relative z-10 overflow-hidden bg-white dark:bg-gray-700 py-20 lg:py-[110px] mb-8">
            <div class="container mx-auto">
                <div class="relative overflow-hidden">
                    <div class="-mx-4 flex flex-wrap items-stretch">
                        <div class="w-full px-4">
                            <div class="mx-auto max-w-[570px] text-center sm:z-10">
                                <h2 class="mb-2.5 text-3xl flex flex-col font-bold leading-snug dark:text-white md:text-[40px]">
                                    <span class="pr-0.5 text-xl lg:text-4xl">Ingin bergabung dan berdiskusi bersama user lain?</span>
                                </h2>
                                <p class="mb-6 text-base leading-relaxed dark:text-white p-5 md:pr-10">
                                    anda bisa bergabung dengan chat global kami, dan berdiskusi dengan pengguna lainnya tentang apa yang mungkin anda inginkan
                                </p>
                                    @if (Auth::guard('user')->check())
                                        <a href="{{ route('global') }}"
                                            class="inline-block rounded-md border border-transparent bg-[#2196F3] px-7 py-3 text-base font-medium text-white transition hover:bg-opacity-90">
                                            Join chat
                                        </a>
                                    @elseif (Auth::guard('merchant')->check())
                                        <a href="{{ route('global') }}"
                                            class="inline-block rounded-md border border-transparent bg-[#2196F3] px-7 py-3 text-base font-medium text-white transition hover:bg-opacity-90">
                                            Join chat
                                        </a>
                                    @else
                                    <a href="{{ route('login') }}"
                                        class="inline-block rounded-md border border-transparent bg-[#2196F3] px-7 py-3 text-base font-medium text-white transition hover:bg-opacity-90">
                                        Get Started now
                                    </a>
                                    @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:block hidden">
                <span class="absolute left-0 top-0 sm:z-0">
                    <svg class="fill-blue-400 dark:fill-gray-800" width="495" height="470" viewBox="0 0 495 470"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04"
                            stroke-width="50"></circle>
                        <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20"></circle>
                       
                    </svg>
                </span>
                <span class="absolute bottom-0 right-0 sm:z-0">
                    <svg class="fill-blue-400 dark:fill-gray-800" width="493" height="470" viewBox="0 0 493 470"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04"
                            stroke-width="50"></circle>
                        <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04"
                            stroke-width="20"></circle>
                       
                    </svg>
                </span>
            </div>
        </section>

    </div>
@endsection
