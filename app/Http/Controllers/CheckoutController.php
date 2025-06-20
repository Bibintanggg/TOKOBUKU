<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function process(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::with('book')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->book->price * $item->quantity;
        }

        // Simpan order
        $order = Order::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'total' => $total,
            'status' => 'pending' // default
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $item->book_id,
                'quantity' => $item->quantity,
                'price' => $item->book->price
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }



    public function index()
    {
        $orders = Order::with('items.book')->where('user_id', Auth::id())->latest()->get();
        return view('user.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,berhasil,tidak berhasil',
        ]);

        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status pesanan diperbarui.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
