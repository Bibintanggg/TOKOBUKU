@extends('layouts.user')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6">Checkout</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Form Checkout -->
            <div>
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" required class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">No Telepon</label>
                        <input type="text" name="phone" required class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                        <textarea name="address" required class="w-full border rounded px-3 py-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                        <select name="payment_method" required class="w-full border rounded px-3 py-2">
                            <option value="cod">Bayar di Tempat (COD)</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Proses Checkout
                    </button>
                </form>


            </div>

            <!-- Ringkasan Keranjang -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>
                <div class="space-y-4 border rounded p-4 shadow max-h-[400px] overflow-y-auto">
                    @php $total = 0; @endphp
                    @foreach ($cartItems as $item)
                        @php $subtotal = $item->book->price * $item->quantity;
    $total += $subtotal; @endphp
                        <div class="border-b pb-2">
                            <p class="font-medium">{{ $item->book->title }}</p>
                            <p class="text-sm text-gray-600">Harga: Rp {{ number_format($item->book->price, 0, ',', '.') }}</p>
                            <p class="text-sm text-gray-600">Jumlah: {{ $item->quantity }}</p>
                            <p class="text-sm font-semibold">Subtotal: Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                        </div>
                    @endforeach

                    <div class="pt-4 border-t font-bold text-right">
                        Total: Rp {{ number_format($total, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection