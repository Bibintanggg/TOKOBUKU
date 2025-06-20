@extends('layouts.user')
@section('title', 'Book Store')

@section('content')
<div class="p-20">
    <div>

    <div class="bg-red-300/30 max-w-[80rem]">
        <div class="text-sm bg-red-300/30 rounded-xl">
            <p>Saat ini, metode pengiriman yang tersedia hanya melalui sistem Cash On Delivery (COD). Kami memohon pengertian dan kesabaran Anda sementara kami terus berupaya menambahkan metode pembayaran dan pengiriman lainnya demi kenyamanan Anda di masa mendatang.</p>
        </div>
    </div>
    <h1 class="text-2xl font-bold mb-4 mt-10">Discover</h1>
    

    <div class="grid grid-cols-3 gap-4">
        @foreach($books as $book)
            <div class="border rounded p-4 shadow">
                <h3>{{ $book->judul }}</h3>

                @if ($book->cover)
                    <img src="{{ asset('covers/' . $book->cover) }}" width="150">
                @else
                    <p>(tidak ada cover)</p>
                @endif

                <h2 class="font-bold text-lg">{{ $book->title }}</h2>
                <p class="text-sm text-gray-500">{{ $book->category->name }}</p>
                <p class="text-sm text-gray-500">{{ $book->description }}</p>
                <p class="text-green-600 font-semibold mb-2">Rp {{ number_format($book->price, 0, ',', '.') }}</p>

                <a href="{{ route('user.books.show', $book->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded">Detail</a>

                <form action="{{ route('cart.store') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Tambah ke Keranjang</button>
                </form>

            </div>
        @endforeach
    </div>
    </div>
</div>

@endsection
