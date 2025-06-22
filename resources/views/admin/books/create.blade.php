@extends('layouts.admin')
@section('title', 'Add Book')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Buku Baru</h1>

        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Judul Buku</label>
                    <input type="text" name="title"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>

                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Penulis</label>
                    <input type="text" name="author"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Cover Buku</label>
                <input type="file" name="cover"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200"
                    accept="image/*">
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Kategori</label>
                <select name="category_id"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Harga</label>
                    <input type="number" name="price"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-gray-700">Stok</label>
                    <input type="number" name="stock"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400"
                        required>
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Deskripsi</label>
                <textarea name="description" rows="5"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-400 resize-none"></textarea>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded shadow">
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>
@endsection