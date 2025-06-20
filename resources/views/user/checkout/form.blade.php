@extends('layouts.user')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <h2 class="text-2xl font-bold mb-4">Checkout</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border rounded px-4 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Alamat</label>
                <textarea name="address" class="w-full border rounded px-4 py-2" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">No. Telepon</label>
                <input type="text" name="phone" class="w-full border rounded px-4 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Metode Pembayaran</label>
                <select name="payment_method" class="w-full border rounded px-4 py-2" required>
                    <option value="transfer">Transfer Bank</option>
                    <option value="cod">Bayar di Tempat</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Proses Checkout
            </button>
        </form>
    </div>
@endsection