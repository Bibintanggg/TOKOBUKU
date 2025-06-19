@extends('layouts.admin')
@section('title', 'Books')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Books</h1>

    <a href="{{ route('admin.books.create') }}" 
    class=" text-white py-2 px-4 rounded mb-4 inline-block bg-blue-500"
    >Add Book</a>
    <table class="table-auto w-full  text-center">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Author</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Stock</th>
                <th class="p-2 border">Cover</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $book->title }}</td>
                    <td class="p-2 border">{{ $book->author }}</td>
                    <td class="p-2 border">{{ $book->category->name }}</td>
                    <td class="p-2 border">{{ $book->price }}</td>
                    <td class="p-2 border">{{ $book->stock }}</td>
                    <td class="p-2 border">
                        @if ($book->cover)
                            <img src="{{ asset('covers/' . $book->cover) }}" alt="Cover" width="80">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection

