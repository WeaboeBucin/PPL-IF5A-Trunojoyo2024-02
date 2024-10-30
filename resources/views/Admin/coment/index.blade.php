@extends('Admin.Layout.Master')

@section('content')
    <div class="min-h-screen p-4 sm:ml-64">
        <div class="mt-14 rounded-lg p-4">
            <nav class="mb-4 flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.index') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <ion-icon name="home" class="me-2.5 h-4 w-4"></ion-icon>
                            Dashboard
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="mx-1 w-3 text-gray-400 rtl:rotate-180">|</i>
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Daftar
                                Comentar</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white md:text-4xl">
                Daftar Comentar</h2>
            <div class="block rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
                <div class="relative overflow-x-auto">
                    <div class="pb-4">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div
                                class="rtl:inset-r-0 pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="table-search"
                                class="block w-80 rounded-lg border border-gray-300 bg-gray-50 ps-10 pt-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Search for items">
                        </div>
                    </div>
                    <table
                        class="w-full overflow-hidden text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400 sm:rounded-lg">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Isi Komentar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Postingan produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <td class="px-6 py-4">
                                    1
                                </td>
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                    |
                                    <a href="#"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Hapus</a>
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-gray-50 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                <td class="px-6 py-4">
                                    2
                                </td>
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Google Pixel Phone
                                </th>
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Google Pixel Phone
                                </th>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                    |
                                    <a href="#"
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav class="flex-column flex flex-wrap items-center justify-between pt-4 md:flex-row"
                        aria-label="Table navigation">
                        <span
                            class="mb-4 block w-full text-sm font-normal text-gray-500 dark:text-gray-400 md:mb-0 md:inline md:w-auto">Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                                class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                        <ul class="inline-flex h-8 -space-x-px text-sm rtl:space-x-reverse">
                            <li>
                                <a href="#"
                                    class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="flex h-8 items-center justify-center border border-gray-300 bg-blue-50 px-3 text-blue-600 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
