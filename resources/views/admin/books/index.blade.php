@extends('layouts.admin')
@section('title', 'Books')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Data Buku</h1>
            <a href="{{ route('admin.books.create') }}" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                + Tambah Buku
            </a>
        </div>

        <form action="{{ route('admin.books.index') }}" method="GET" class="flex gap-2 mb-6">
            <input type="text" name="search" placeholder="Cari buku..."
                class="border border-gray-300 rounded px-4 py-2 w-full md:w-1/3 focus:outline-none focus:ring focus:border-blue-300"
                value="{{ request('search') }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Cari
            </button>
        </form>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm text-gray-700">
                <thead>
                    <tr class="bg-gray-100 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        <th class="p-4">#</th>
                        <th class="p-4">Judul</th>
                        <th class="p-4">Penulis</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Stok</th>
                        <th class="p-4">Cover</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4">{{ $loop->iteration }}</td>
                            <td class="p-4 font-medium">{{ $book->title }}</td>
                            <td class="p-4">{{ $book->author }}</td>
                            <td class="p-4">{{ $book->category->name ?? '-' }}</td>
                            <td class="p-4">Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                            <td class="p-4">{{ $book->stock }}</td>
                            <td class="p-4">
                                @if ($book->cover)
                                    <img src="{{ asset('covers/' . $book->cover) }}" alt="Cover" class="w-16 h-24 object-cover rounded shadow">
                                @else
                                    <span class="text-gray-500 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-4 text-center space-x-2">
                                <a href="{{ route('admin.books.edit', $book->id) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-4 text-center text-gray-500 italic">Tidak ada buku ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
