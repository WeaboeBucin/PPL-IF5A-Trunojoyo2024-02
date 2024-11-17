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
                    <li>
                        <div class="flex items-center">
                            <i class="mx-1 w-3 text-gray-400 rtl:rotate-180">|</i>
                            <a class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2"
                                href="{{ route('merchant.products.index')}}">Daftar
                                Produk</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="mx-1 w-3 text-gray-400 rtl:rotate-180">|</i>
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Edit
                                Produk</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white md:text-4xl">
                Edit Produk</h2>
            @if (session()->has('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @error('name')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('description')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('price')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            {{-- @error('rating')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror --}}
            @error('status')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('photo')
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="block rounded-lg border border-gray-200 bg-white p-6 shadow dark:border-gray-700 dark:bg-gray-800">
                <dl>
                    <dd class="mb-6 font-light text-gray-500 dark:text-gray-400">
                        <img class="size-30 rounded-lg"
                            src="{{ asset('storage/' . $product->photo) }}"
                            alt="Helene avatar">
                    </dd>
                </dl>
                <form action="{{ route('merchant.products.update', ['product' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="text-input">Nama</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="text-input" name="name" type="text" aria-describedby="helper-text-explanation"
                            value="{{ old('name') ?? $product->name }}" required>
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="message">Deskripsi</label>
                        <textarea
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="message" name="description" rows="4">{{ old('description') ?? $product->description }}</textarea>
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="message">Kategori</label>
                        <div class="flex">
                            <div class="mb-4 flex items-center">
                                <select name="category_id" class="leading-none dark:text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-100 dark:bg-gray-800 rounded" required>
                                  <option value="">Pilih kategori</option>
                                  <?php $counted = 0; $category_product = [1=>'Electronics',2=>'Fashion',3=>'Book',4=>"Beauty & Health",5=>"Sports & Outdoors",6=>"Toys & Hobbies",7=>'Automotive',8=>'Books',9=>'Groceries',10=>'Office Supplies'];
                                  foreach ($category_product as $kachina_select_categoryID=>$kachina_select_category) {
                                    $counted += 1;
                                    if ((old('category') ?? $product->category['id']) === $counted) {
                                      echo "<option value=\"{$kachina_select_categoryID}\" selected>{$kachina_select_category}</option>";
                                    } else {
                                      echo "<option value=\"{$kachina_select_categoryID}\">{$kachina_select_category}</option>";
                                    }
                                  } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="number-input">Harga</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="number-input" name="price" type="number" aria-describedby="helper-text-explanation"
                            placeholder="90210" value="{{ old('price') ?? $product->price }}" required>
                    </div>
                    {{-- <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="text-input">Rating</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            id="text-input" name="rating" type="text" aria-describedby="helper-text-explanation"
                            value="{{ old('rating') ?? $product->rating }}" required>
                    </div> --}}
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="message">Status</label>
                        <div class="flex">
                            <div class="me-4 flex items-center">
                                <input
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    id="inline-radio" name="status" type="radio" value="tersedia"
                                    @if ((old('status') ?? $product->status) === 'tersedia') checked @endif>
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="inline-radio">Tersedia</label>
                            </div>
                            <div class="me-4 flex items-center">
                                <input
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    id="inline-2-radio" name="status" type="radio" value="habis"
                                    @if ((old('status') ?? $product->status) === 'habis') checked @endif>
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="inline-2-radio">Habis</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Photo</label>
                        <input
                            class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                            id="file_input" name="photo" type="file" aria-describedby="file_input_help">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG
                            (MAX. 2MB).</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                            type="submit">Ubah</button>
                        <button
                            class="delete-button rounded-lg bg-red-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 sm:w-auto"
                            type="button">Hapus</button>
                    </div>
                </form>
                <form class="delete-form hidden"
                    action="{{ route('merchant.products.destroy', ['product' => $product->id]) }}" method="POST">
                    @method('delete')
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <script>
        const deleteButton = document.querySelector('.delete-button');
        const deleteForm = document.querySelector('.delete-form');

        deleteButton.addEventListener('click', () => {
            const confirmed = confirm('Apakah Anda yakin ingin menghapus produk?');

            if (confirmed) deleteForm.submit();
        });
    </script>
@endsection
