@extends('layouts.user')
@section('title', 'My Orders')

@section('content')
    <h1 class="text-2xl font-bold mb-4">My Orders</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Book</th>
                <th class="p-2 border">Total</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="p-2 border">{{ $loop->iteration }}</td>
                <td class="p-2 border">{{ $order->book->title }}</td>
                <td class="p-2 border">{{ $order->total }}</td>
                <td class="p-2 border">{{ $order->status }}</td>
                <td class="p-2 border">{{ $order->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
