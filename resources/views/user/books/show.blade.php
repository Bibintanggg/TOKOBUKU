@extends('layouts.user')
@section('title', $book->title)

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-24">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-2">
                <div class="flex flex-col md:flex-row gap-8">

                    <div class="md:w-1/2">
                        @if ($book->cover)
                            <img src="{{ asset('covers/' . $book->cover) }}" alt="{{ $book->title }}"
                                class="rounded-xl shadow w-full h-[420px] object-cover">
                        @else
                            <div class="w-full h-[420px] bg-gray-200 flex items-center justify-center rounded-xl text-gray-500">
                                Tidak ada cover
                            </div>
                        @endif
                    </div>

                    <div class="md:w-1/2 flex flex-col justify-between">
                        <div>
                            <p class="text-gray-500 mb-1">By <strong>{{ $book->author ?? 'Unknown Author' }}</strong></p>
                            <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $book->title }}</h1>

                            <div class="flex items-center gap-4 mb-4">
                                <span class="text-2xl font-bold text-red-600">Rp
                                    {{ number_format($book->price, 0, ',', '.') }}</span>
                                <span class="text-sm line-through text-gray-400">Rp
                                    {{ number_format($book->price * 1.15, 0, ',', '.') }}</span>
                                <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded-full font-semibold">Diskon
                                    15%</span>
                            </div>

                            <p class="text-sm text-gray-600 mb-2 bg-gray-400 items-center max-w-40 h-7 rounded-full flex items-center justify-center  bg-clip-padding backdrop-filter backdrop-blur-xl bg-opacity-30 border border-gray-100">
                                <strong class="mr-3">Kategori: </strong> {{ $book->category->name }}
                            </p>

                            <p class="text-base font-medium text-gray-600 mb-2 bg-gray-400 max-w-96 h-7 rounded-full flex bg-clip-padding backdrop-filter backdrop-blur-xl bg-opacity-30 border border-gray-100">
                                <span class="ml-5">Deskripsi : {{ $book->description }}</span>
                            </p>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST" class="flex flex-col gap-4">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">

                            <div class="flex items-center gap-4">
                                <label for="quantity" class="text-sm font-medium text-gray-700">Jumlah:</label>

                                <div class="flex items-center border rounded-lg overflow-hidden">
                                    <button type="button" onclick="changeQty(-1)"
                                        class="bg-gray-200 px-3 text-lg font-bold">-</button>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1"
                                        class="w-16 text-center border-none focus:ring-0">
                                    <button type="button" onclick="changeQty(1)"
                                        class="bg-gray-200 px-3 text-lg font-bold">+</button>
                                </div>
                            </div>

                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow transition">
                                + Tambah ke Keranjang
                            </button>
                        </form>

                    </div>

                </div>
            </div>

            <div class="lg:col-span-1 bg-gray-50 p-6 rounded-xl shadow-md h-fit">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Review Pembaca</h2>


                <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2">
                    @forelse($book->reviews as $review)
                        <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                            <div class="flex justify-between items-center mb-1">
                                <p class="font-semibold text-gray-700">{{ $review->user->name }}</p>
                                <span class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-600 text-sm">{{ $review->review }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 italic">Belum ada review.</p>
                    @endforelse
                </div>

                <form action="{{ route('user.reviews.store') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">

                    <label for="review" class="block text-sm font-medium text-gray-700 mb-2">Tulis Review</label>
                    <textarea name="review" id="review" rows="3" required
                        class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                        placeholder="Bagaimana pendapatmu?"></textarea>

                    <button type="submit"
                        class="mt-3 w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg font-semibold shadow">
                        Kirim
                    </button>
                </form>



            </div>
        </div>
    </div>

        <script>
            function changeQty(amount) {
                const qtyInput = document.getElementById('quantity');
                let value = parseInt(qtyInput.value);
                if (!isNaN(value)) {
                    value += amount;
                    if (value < 1) value = 1;
                    qtyInput.value = value;
                }
            }
        </script>
@endsection