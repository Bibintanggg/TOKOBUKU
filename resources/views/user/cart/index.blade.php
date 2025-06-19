@extends('layouts.user')

@section('content')
<h1 class="text-2xl font-bold mb-4">Keranjang</h1>
<table class="table-auto w-full text-left">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">Buku</th>
            <th class="p-2">Jumlah</th>
            <th class="p-2">Harga</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td class="p-2">{{ $item->book->title }}</td>
                <td class="p-2">{{ $item->quantity }}</td>
                <td class="p-2">Rp{{ number_format($item->book->price, 0, ',', '.') }}</td>
                <td class="p-2">
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>

            @if ($cartItems->isNotEmpty())
            <form action="{{ route('cart.checkout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Checkout Sekarang</button>
            </form>
        @endif

        @endforeach
    </tbody>
</table>

<form action="{{ route('checkout.process') }}" method="POST" class="mt-4">
    @csrf
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Checkout</button>
</form>
@endsection