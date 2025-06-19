@extends('layouts.user')
@section('title', $book->title)

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>

    <div class="border rounded p-4 mb-4 shadow">
        <p><strong>Category:</strong> {{ $book->category->name }}</p>
        <p><strong>Price:</strong> Rp {{ number_format($book->price, 0, ',', '.') }}</p>
        <p class="mt-4">{{ $book->description }}</p>

        <form action="{{ route('user.orders.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Buy</button>
        </form>
    </div>

    <h2 class="text-xl font-bold mb-2">Reviews</h2>
    <div class="space-y-2 mb-4">
        @foreach($book->reviews as $review)
            <div class="border p-2 rounded">
                <p class="font-semibold">{{ $review->user->name }}:</p>
                <p>{{ $review->review }}</p>
            </div>
        @endforeach
    </div>

    <form action="{{ route('user.reviews.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <textarea name="review" class="w-full border rounded p-2 mb-2" placeholder="Write a review..."></textarea>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
    </form>
@endsection
