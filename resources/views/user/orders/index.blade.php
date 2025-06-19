<h1 class="text-2xl font-bold mb-4">Pesanan Saya</h1>
@foreach($orders as $order)
    <div class="border p-4 mb-4">
        <h2 class="font-semibold">Pesanan #{{ $order->id }} - Total: Rp{{ number_format($order->total, 0, ',', '.') }}</h2>
        <ul class="list-disc ml-6">
            @foreach($order->items as $item)
                <li>{{ $item->book->title }} - {{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}</li>
            @endforeach
        </ul>
    </div>
@endforeach