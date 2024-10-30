@extends('Admin.Layout.Master')
@section('title', 'User Manage')
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
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Daftar User</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white md:text-4xl">
                Daftar User</h2>
            <div class="block rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
                <div class="relative overflow-x-auto">
                    <form action="" method="GET" class="pb-4">
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
                            <input type="text" id="table-search" name="search"
                                class="block w-80 rounded-lg border border-gray-300 bg-gray-50 ps-10 pt-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Search for items" value="{{ request('search') }}">
                        </div>
                    </form>
                    <table
                        class="w-full overflow-hidden text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400 sm:rounded-lg">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($loop->last)
                                    <tr class="odd:bg-white even:bg-gray-50 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                        <td class="px-6 py-4">
                                            {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                        </td>
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </th>
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $user->email }} 
                                        </th>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                            |
                                            <form
                                            id="deleteForm-{{ $user->id }}"
                                            action="{{ route('admin.users.destroy', ['user' => $user->id]) }}"
                                            method="POST" class="inline-block" >
                                            @method('delete')
                                            @csrf
                                            <button type="button" id="user-{{ $user->id }}" onclick="return confirmDelete({{ $user->id }})"
                                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @else
                                    <tr
                                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                                        <td class="px-6 py-4">
                                            {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                        </td>
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </th>
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $user->email }} 
                                        </th>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                            |
                                            <form
                                            id="deleteForm-{{ $user->id }}"
                                            action="{{ route('admin.users.destroy', ['user' => $user->id]) }}"
                                            method="POST" class="inline-block"
                                            >
                                            
                                            @method('delete')
                                            @csrf
                                            <button type="button" id="user-{{ $user->id }}" onclick="return confirmDelete({{ $user->id }})"
                                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->onEachSide(1)->links('Admin.Partials.Pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
