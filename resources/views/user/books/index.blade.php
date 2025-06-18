@extends('layouts.user')
@section('title', 'Book Store')

@section('content')
    <h1 class="text-2xl font-bold mb-4">All Books</h1>

    <div class="grid grid-cols-3 gap-4">
        @foreach($books as $book)
            <div class="border rounded p-4 shadow">
                <h2 class="font-bold text-lg">{{ $book->title }}</h2>
                <p class="text-sm text-gray-500">{{ $book->category->name }}</p>
                <p class="text-green-600 font-semibold mb-2">${{ $book->price }}</p>
                <a href="{{ route('user.books.show', $book->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded">Detail</a>
            </div>
        @endforeach
    </div>
@endsection
