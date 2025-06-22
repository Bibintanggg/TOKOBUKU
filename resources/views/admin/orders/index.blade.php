@extends('layouts.admin')
@section('title', 'Order')

@section('content')

    <h1 class="text-2xl font-bold mb-4">Semua Pesanan</h1>

    @foreach($orders as $order)
        <div class="border p-4 mb-4 rounded-xl shadow">
            <div class="flex justify-between items-center mb-2">
                <h2 class="font-semibold">
                    Pesanan #{{ $order->id }} oleh {{ $order->user->name }} - Total:
                    Rp{{ number_format($order->total, 0, ',', '.') }}
                </h2>

                <!-- APdet Status -->
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="flex items-center gap-2">
                    @csrf
                    @method('PUT')
                    <select name="status" class="border rounded px-2 py-1 text-sm" onchange="this.form.submit()">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="berhasil" {{ $order->status === 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                        <option value="tidak berhasil" {{ $order->status === 'tidak berhasil' ? 'selected' : '' }}>Tidak Berhasil
                        </option>
                    </select>
                </form>
            </div>

            <ul class="list-disc ml-6">
                @foreach($order->items as $item)
                    <li>{{ $item->book->title }} - {{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach

@endsection