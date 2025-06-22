@extends('layouts.admin')

@section('content')

    <div class="max-w-xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Kategori Baru</h1>

        <form method="POST" action="{{ route('admin.categories.store') }}"
            class="bg-white shadow-md rounded-lg p-6 space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Nama Kategori:</label>
                <input type="text" name="name" id="name" required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>

@endsection