@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6 text-gray-800"> Semua Pesanan</h1>

    @forelse($orders as $order)
        <div class="bg-white border border-gray-200 p-6 mb-6 rounded-xl shadow-sm">
            <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-3">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        #{{ $order->id }} - {{ $order->user->name }}
                    </h2>
                    <p class="text-sm text-gray-500">
                        Total: <span class="font-bold text-black">Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                    </p>
                </div>

                {{-- Ini Form update status --}}
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()" class="rounded-full px-3 py-1 text-sm font-semibold focus:outline-none focus:ring
                                        @if($order->status === 'pending')
                                            bg-yellow-100 text-yellow-700 border-yellow-400
                                        @elseif($order->status === 'berhasil')
                                            bg-green-100 text-green-700 border-green-400
                                        @elseif($order->status === 'tidak berhasil')
                                            bg-red-100 text-red-700 border-red-400
                                        @endif
                                        ">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}> Pending</option>
                        <option value="berhasil" {{ $order->status === 'berhasil' ? 'selected' : '' }}> Berhasil</option>
                        <option value="tidak berhasil" {{ $order->status === 'tidak berhasil' ? 'selected' : '' }}> Tidak Berhasil
                        </option>
                    </select>
                </form>

            </div>

            {{-- Ini Detail Pengiriman --}}
            <div class="mb-4 text-sm text-gray-700">
                <p><strong>Alamat:</strong> {{ $order->address }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
            </div>

            {{-- Ini List Item Buku --}}
            <ul class="list-disc list-inside text-sm text-gray-700">
                @foreach($order->items as $item)
                    <li>
                        <span class="font-semibold">{{ $item->book->title }}</span> —
                        {{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}
                    </li>
                @endforeach
            </ul>
        </div>
    @empty
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded">
            Tidak ada pesanan untuk saat ini.
        </div>
    @endforelse

@endsection