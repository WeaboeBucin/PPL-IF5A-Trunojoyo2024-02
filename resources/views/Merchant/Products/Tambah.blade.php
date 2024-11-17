@extends('Merchant.Layouts.Master')
@section('title', 'Dashboard Merchant')
@section('content')

<section class="w-full min-h-screen p-4">
    <div class="mt-14 rounded-lg p-0 lg:p-4">
        <div class="max-w-4xl mx-auto p-5 rounded-lg bg-white dark:bg-gray-700 dark:text-white">
            <h2 class="text-2xl font-semibold mb-4 pl-2">Informasi Produk</h2>
            <form action="{{ route('merchant.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium mb-1 pl-2 lg:pl-20">Foto Produk</label>
                    <div class="h-20 w-20 ml-2 lg:ml-[12rem] border-dashed border-2 border-zinc-300 dark:border-zinc-600 rounded-lg text-center">
                        <input type="file" name="photo" class="hidden" id="product-photo">
                        <button type="button" onclick="document.getElementById('product-photo').click()" class="text-red-600 text-xs mt-5">Tambahkan Foto (0/1)</button>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-16">Nama Produk
                        <input type="text" name="name" class="leading-none dark:text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-100 dark:bg-gray-800 rounded" placeholder="Isikan Nama Produk" required>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-24">Kategori
                        <select name="category_id" class="leading-none dark:text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-100 dark:bg-gray-800 rounded" required>
                            <option value="">Pilih kategori</option>
                            <?php $category_product = [1=>'Electronics',2=>'Fashion',3=>'Book',4=>"Beauty & Health",5=>"Sports & Outdoors",6=>"Toys & Hobbies",7=>'Automotive',8=>'Books',9=>'Groceries',10=>'Office Supplies'];
                            foreach ($category_product as $kachina_select_categoryID=>$kachina_select_category) {
                            echo "<option value=\"{$kachina_select_categoryID}\">{$kachina_select_category}</option>";
                            } ?>
                        </select>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-24">Harga
                        <input type="number" name="price" class="leading-none dark:text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-100 dark:bg-gray-800 rounded" placeholder="Harga" required>
                    </label>
                </div>

                <div class="flex flex-col md:flex-row items-start space-x-2 md:space-x-4 mb-4">
                    <label for="product-description" class="text-sm font-medium  ml-2 md:ml-14">Deskripsi Produk</label>
                    <textarea id="product-description" name="description" rows="5" class="w-11/12 leading-none dark:text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-100 dark:bg-gray-800 rounded"></textarea>
                </div>

                <div class="mb-4">
                    <label class="flex flex-col md:flex-row font-medium mb-1 ml-2 md:ml-24">Ketersediaan
                        <select name="status" class="w-[15rem] md:w-[40rem] border-zinc-300 border rounded-lg p-2 ml-0 md:ml-10 dark:text-black" required>
                            <option value="">Pilih ketersediaan</option> 
                            <option value="tersedia">Tersedia</option>
                            <option value="habis">Habis</option>
                        </select>
                    </label>
                </div>

                <div class="flex justify-start md:justify-end md:mx-8 mx-0 space-x-2 mt-10">
                    <a href="{{ route('merchant.products.index') }}" class="bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-zinc-200 px-4 py-2 rounded-lg">Kembali</a>
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">Simpan & Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
