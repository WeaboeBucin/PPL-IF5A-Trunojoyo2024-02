@extends('Merchant.Layouts.Master')
@section('title', 'Dashboard Merchant')
@section('content')
    <div class="min-h-screen p-4 sm:ml-64">
        <div class="mt-14 rounded-lg p-4">
            <h1 class="text-xl font-bold">Mulai konfigurasi toko anda di edit profile toko</h1>
            <div  class="mt-4 grid w-full grid-cols-1 gap-4 xl:grid-cols-2">
                <div
                    class="items-center justify-between rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:flex sm:p-6">
                    <div class="w-full">
                        <h3 class="mb-3 text-base font-bold text-gray-900 dark:text-white">Postingan Produk</h3>
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 dark:text-white sm:text-3xl">{{ $products_count }}</span>
                        <p class="mt-2 flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                            Diposting
                        </p>
                    </div>
                    <div class="w-full text-end text-5xl text-blue-800" id="week-signups-chart">
                        <i class="fa-solid fa-fire"></i>
                    </div>
                </div>
                <div
                    class="items-center justify-between rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:flex sm:p-6">
                    <div class="w-full">
                        <h3 class="mb-3 text-base font-bold text-gray-900 dark:text-white">Komentar</h3>
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 dark:text-white sm:text-3xl">{{ $comments_count }}</span>
                        <p class="mt-2 flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
                            Diposting
                        </p>
                    </div>
                    <div class="w-full text-end text-5xl text-blue-800" id="week-signups-chart">
                        <i class="fa-solid fa-comment-dots"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
