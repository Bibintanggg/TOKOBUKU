@extends('layouts.user')

@section('title', 'Keranjang')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-20">
        <h1 class="text-2xl font-bold mb-6">Keranjang Saya</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($cartItems->isEmpty())
            <p class="text-gray-600">Keranjang kamu kosong.</p>
        @else
                <table class="w-full border rounded-lg overflow-hidden shadow">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="p-4">Judul Buku</th>
                            <th class="p-4">Harga</th>
                            <th class="p-4">Jumlah</th>
                            <th class="p-4">Subtotal</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($cartItems as $item)
                            @php
            $subtotal = $item->book->price * $item->quantity;
            $total += $subtotal;
                            @endphp
                            <tr class="border-t">
                                <td class="p-4">{{ $item->book->title }}</td>
                                <td class="p-4">Rp {{ number_format($item->book->price, 0, ',', '.') }}</td>
                                <td class="p-4">{{ $item->quantity }}</td>
                                <td class="p-4">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td class="p-4">
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin hapus item ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="font-bold bg-gray-100 border-t">
                            <td colspan="3" class="p-4 text-right">Total</td>
                            <td class="p-4">Rp {{ number_format($total, 0, ',', '.') }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <form action="{{ route('cart.checkout') }}" method="GET" class="mt-6 text-right">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
                        Checkout Sekarang
                    </button>
                </form>

        @endif
    </div>
@endsection