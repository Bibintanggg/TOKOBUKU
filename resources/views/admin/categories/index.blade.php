@extends('layouts.admin')
@section('title', 'Categories')

@section('content')

    <div class=" mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800"> Kategori</h1>
            <a href="{{ route('admin.categories.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">
                + Tambah Kategori
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="table-auto w-full text-sm text-center text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border-b">#</th>
                        <th class="p-3 border-b">Nama Kategori</th>
                        <th class="p-3 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border-b">{{ $loop->iteration }}</td>
                            <td class="p-3 border-b font-medium">{{ $category->name }}</td>
                            <td class="p-3 border-b space-x-2">
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="text-blue-600 hover:underline font-medium">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-gray-500 italic">Belum ada kategori yang ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection