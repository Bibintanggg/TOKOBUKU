@extends('layouts.user')
@section('title', 'Book Store')

@section('content')
    <div
        class="relative w-screen overflow-hidden left-1/2 -ml-[50vw] -mr-[50vw] bg-gradient-to-r from-blue-600 to-blue-800 text-white py-32 px-6">

        <div class="absolute -top-10 -left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 -right-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-5xl mx-auto text-center animate-fade-in-up">
            <p class="text-3xl font-medium mb-2">Haloo, {{ Auth::user()->name }}</p>
            <h1 class="text-4xl font-extrabold mb-4">
                <i class="fa-solid fa-book"></i> Selamat Datang di <span class="text-yellow-300">Toko Buku Online!</span>
            </h1>
            <p class="text-lg max-w-3xl mx-auto text-white/90">
                Temukan buku favoritmu — dari buku pelajaran hingga novel inspiratif. Yuk mulai jelajahi! 
            </p>
            <a href="#books"
                class="mt-8 inline-block bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-semibold py-2 px-6 rounded-full shadow transition">
                Lihat Buku 
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-10 py-12">
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded-md mb-10 shadow">
            <p class="text-sm">
                Saat ini, metode pengiriman yang tersedia hanya melalui sistem <strong>Cash On Delivery (COD)</strong>. Kami
                memohon pengertian dan kesabaran Anda sementara kami terus berupaya menambahkan metode pembayaran dan
                pengiriman lainnya demi kenyamanan Anda di masa mendatang.
            </p>
        </div>

        <div class="flex justify-between items-center flex-wrap gap-4">
            <h1 class="text-2xl font-bold text-gray-800">Temukan Buku Favoritmu!</h1>
            <form action="{{ route('user.books.index') }}" method="GET" class="flex gap-2 items-center">
                <input type="text" name="search" placeholder="Cari buku.. Contoh: Inten Prosus Matematika"
                    class="border rounded-full px-4 py-2 w-96" value="{{ request('search') }}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full">Cari</button>
                <a href="{{ route('cart.index') }}" class="text-blue-600 text-xl ml-2 hover:text-blue-800">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </form>
        </div>

        {{-- terbaru --}}
        <h1 class="mt-10 text-xl font-semibold">Beberapa buku yang baru saja ditambahkan</h1>
        <div class="grid gap-4 grid-cols-2 mt-10 w-[35rem]">
            @foreach($books as $book)
                <a href="{{ route('user.books.show', $book->id) }}"
                    class="block bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden text-gray-800">
                    @if ($book->cover)
                        <img src="{{ asset('covers/' . $book->cover) }}" alt="{{ $book->judul }}" class="w-full h-80 object-cover">
                    @else
                        <div class="w-full h-36 bg-gray-200 flex items-center justify-center text-gray-500 italic">
                            <i class="fa-solid fa-book-open-reader"></i>Tidak ada cover
                        </div>
                    @endif

                    <div class="p-3 text-sm">
                        <p class="text-xs text-gray-500">By {{ $book->author }}</p>
                        <h2 class="font-semibold truncate text-base">{{ $book->title }}</h2>
                        <p class="text-gray-500 text-base">{{ $book->category->name }}</p>
                        <p class="text-gray-600 font-bold mt-1 text-xl">Rp {{ number_format($book->price, 0, ',', '.') }}</p>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- kategori --}}
        <h1 class="text-xl font-semibold text-black mt-14">Buku Berdasarkan Kategori</h1>
        @foreach ($categories as $category)
            @if ($category->books->count())
                <div class="mt-10 pl-10">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Buku  {{ $category->name }}</h2>

                    <div class="grid gap-3 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                        @foreach ($category->books as $book)
                            <a href="{{ route('user.books.show', $book->id) }}"
                                class="block bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden text-gray-800 text-xs">
                                @if ($book->cover)
                                    <img src="{{ asset('covers/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-40 object-cover">
                                @else
                                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500 italic">
                                        <i class="fa-solid fa-book-open-reader"></i>Tidak ada cover
                                    </div>
                                @endif

                                <div class="p-2">
                                    <p class="text-[10px] text-gray-500">By {{ $book->author }}</p>
                                    <h2 class="font-semibold truncate">{{ $book->title }}</h2>
                                    <p class="text-[11px] text-gray-400 italic">{{ $book->category->name }}</p>
                                    <p class="text-black font-bold mt-1 text-sm">Rp {{ number_format($book->price, 0, ',', '.') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection
