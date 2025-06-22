@extends('layouts.admin')


@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">

        <div class="bg-white rounded-xl shadow-sm p-4 border-t-4 border-blue-500 text-center">
            <div class="text-sm text-gray-500">Buku</div>
            <div class="text-2xl font-bold text-blue-700">{{ $bookCount }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border-t-4 border-yellow-500 text-center">
            <div class="text-sm text-gray-500">Kategori</div>
            <div class="text-2xl font-bold text-yellow-600">{{ $categoryCount }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border-t-4 border-purple-500 text-center">
            <div class="text-sm text-gray-500">Pengguna</div>
            <div class="text-2xl font-bold text-purple-600">{{ $userCount }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border-t-4 border-green-500 text-center">
            <div class="text-sm text-gray-500">Pesanan</div>
            <div class="text-2xl font-bold text-green-600">{{ $orderCount }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border-t-4 border-yellow-400 text-center">
            <div class="text-sm text-gray-500">Pending</div>
            <div class="text-2xl font-bold text-yellow-500">{{ $pendingCount }}</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 border-t-4 border-emerald-500 text-center">
            <div class="text-sm text-gray-500">Berhasil</div>
            <div class="text-2xl font-bold text-emerald-600">{{ $successCount }}</div>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mt-10">

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">Ringkasan Pesanan</h2>
            <ul class="text-gray-600 text-sm space-y-2">
                <li><strong>Hari ini:</strong> {{ $ordersToday }} pesanan</li>
                <li><strong>Minggu ini:</strong> {{ $ordersThisWeek }} pesanan</li>
            </ul>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-800">Pesanan Terbaru</h2>
            <ul class="text-gray-700 text-sm space-y-3">
                @forelse($latestOrders as $order)
                    <li class="flex justify-between">
                        <div>
                            <span class="font-medium">#{{ $order->id }}</span> dari
                            <span>{{ $order->user->name }}</span>
                            <span class="block text-xs text-gray-400">{{ $order->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                @if($order->status == 'pending') bg-yellow-100 text-yellow-700
                                @elseif($order->status == 'berhasil') bg-green-100 text-green-700
                                @else bg-red-100 text-red-700 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </li>
                @empty
                    <li>Tidak ada pesanan terbaru.</li>
                @endforelse
            </ul>
        </div>
    </div>

@endsection