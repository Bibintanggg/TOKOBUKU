@extends('layouts.user')
@section('title', $book->title)

@section('content')
<div class="flex flex-col md:flex-row gap-8 p-10" >
    <!-- Gambar Cover -->
    <div class="md:w-1/3">
        @if ($book->cover)
            <img src="{{ asset('covers/' . $book->cover) }}" alt="{{ $book->title }}" class="rounded shadow w-full">
        @else
            <div class="w-full h-[400px] bg-gray-200 flex items-center justify-center rounded shadow">
                <p class="text-gray-500">(tidak ada cover)</p>
            </div>
        @endif
    </div>

    <div class="md:w-2/3">
        <p class="text-lg text-gray-600 ">By {{ $book->author ?? 'Unknown Author' }}</p>
        <h1 class="text-3xl font-bold mb-2">{{ $book->title }}</h1>

        <div class="flex items-center mb-4">
            <div class="text-2xl font-bold text-red-500 mr-4">Rp {{ number_format($book->price, 0, ',', '.') }}</div>
            <div class="text-sm text-gray-400 line-through">Rp {{ number_format($book->price * 1.15, 0, ',', '.') }}</div>
            <div class="ml-2 text-sm bg-red-200 text-red-600 px-2 py-1 rounded">15%</div>
        </div>

        <p class="mb-4"><strong>Category:</strong> {{ $book->category->name }}</p>

        <!-- Deskripsi -->
        <p class="mb-4">{{ $book->description }}</p>

        <!-- Tombol Beli -->
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded shadow">
                + Keranjang
            </button>
        </form>
    </div>
</div>

<!-- Bagian Review -->
<div class="mt-12">
    <h2 class="text-2xl font-bold mb-4">Reviews</h2>
    <div class="space-y-4">
        @foreach($book->reviews as $review)
            <div class="border p-4 rounded shadow">
                <p class="font-semibold">{{ $review->user->name }}:</p>
                <p>{{ $review->review }}</p>
            </div>
        @endforeach
    </div>

    <form action="{{ route('user.reviews.store') }}" method="POST" class="mt-6">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <textarea name="review" class="w-full border rounded p-4 mb-4" placeholder="Write a review..."></textarea>
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded font-semibold shadow">
            Submit Review
        </button>
    </form>
</div>
@endsection
