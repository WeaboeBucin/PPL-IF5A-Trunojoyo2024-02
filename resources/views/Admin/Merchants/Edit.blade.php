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
                    <li>
                        <div class="flex items-center">
                            <i class="mx-1 w-3 text-gray-400 rtl:rotate-180">|</i>
                            <a href="{{ route('admin.merchants.index') }}"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Daftar
                                Merchant</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="mx-1 w-3 text-gray-400 rtl:rotate-180">|</i>
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Edit
                                Merchant</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white md:text-4xl">
                Edit Merchant</h2>
            @if (session()->has('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @error('password')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('password_confirmation')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="block rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
                <section class="mb-6">
                    <div class="max-w-2xl">
                        <div class="mb-4 flex flex-col gap-4 md:flex-row md:items-center">
                            <img class="h-20 w-20 rounded-full"
                                src="{{asset('storage/' . $merchant->logo)   }}"
                                alt="{{ $merchant->name }}">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ $merchant->name }}
                            </h2>
                        </div>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Email:</dt>
                            <dd class="mb-4 font-light text-gray-500 dark:text-gray-400">{{ $merchant->email }}</dd>
                        </dl>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Alamat:</dt>
                            <dd class="mb-4 font-light text-gray-500 dark:text-gray-400">{{ $merchant->address }}</dd>
                        </dl>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Deskripsi:</dt>
                            <dd class="mb-4 font-light text-gray-500 dark:text-gray-400">{{ $merchant->description }}</dd>
                        </dl>
                        <dl>
                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Cover:</dt>
                            <dd class="mb-4 font-light text-gray-500 dark:text-gray-400">
                                <img class="h-20 rounded-lg"
                                    src="{{asset('storage/' . $merchant->cover)   }}"
                                    alt="Helene avatar">
                            </dd>
                        </dl>
                        <form action="{{ route('admin.merchants.destroy', ['merchant' => $merchant->id]) }}" method="POST"
                            class="flex items-center space-x-4"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus merchant?')">
                            <button type="submit"
                                class="rounded-lg bg-red-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 sm:w-auto">Hapus</button>
                            @method('delete')
                            @csrf
                        </form>
                    </div>
                </section>
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah password</h2>
                <form action="{{ route('admin.merchants.update-password', ['merchant' => $merchant->id]) }}"
                    method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-6">
                        <label for="password"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            required />
                    </div>
                    <div class="mb-6">
                        <label for="confirm_password"
                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="password" id="confirm_password" name="password_confirmation"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            required />
                    </div>
                    <button type="submit"
                        class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Ubah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
