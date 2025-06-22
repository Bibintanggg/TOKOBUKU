@extends('layouts.user')

@section('title', 'Pesanan Saya')

@section('content')
    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6">Pesanan Saya</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($orders as $order)
            <div class="bg-white border rounded-xl shadow p-6 mb-6">
                <div class="flex justify-between items-center mb-2">
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Order #{{ $order->id }}</p>
                        <p class="text-sm text-gray-500">{{ $order->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <span class="text-sm font-semibold px-3 py-1 rounded-full
                                @if ($order->status == 'pending') bg-yellow-100 text-yellow-700
                                @elseif ($order->status == 'berhasil') bg-green-100 text-green-700
                                @elseif ($order->status == 'tidak berhasil') bg-red-100 text-red-700
                                @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <div class="border-t mt-3 pt-4">
                    @foreach ($order->items as $item)
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-24 h-32 bg-gray-100 rounded overflow-hidden">
                                @if ($item->book->cover)
                                    <img src="{{ asset('covers/' . $item->book->cover) }}" alt="{{ $item->book->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-sm text-gray-400">
                                        Tidak ada cover
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">{{ $item->book->title }}</p>
                                <p class="text-sm text-gray-600">Jumlah: {{ $item->quantity }}</p>
                                <p class="text-sm text-gray-600">Harga: Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                <p class="text-sm font-semibold mt-1">Subtotal: Rp
                                    {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-right font-bold text-lg text-gray-800 mt-2">
                    Total: Rp {{ number_format($order->total, 0, ',', '.') }}
                </div>
            </div>
        @empty
            <p class="text-gray-500 italic">Belum ada pesanan.</p>
        @endforelse
    </div>
@endsection