<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::with('book')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kamu kosong.');
        }

        // ngitung total harga
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->book->price * $item->quantity;
        }

        // Simpan ke orders
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total
        ]);

        // Simpan detail order (order_items)
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $item->book_id,
                'quantity' => $item->quantity,
                'price' => $item->book->price
            ]);
        }

        // ngosongin cart
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('cart.index')->with('success', 'Checkout berhasil!');
    }
    public function index()
    {
        //
        $cartItems = Cart::with('book')->where('user_id', Auth::id())->get();
        return view('user.cart.index', compact('cartItems'));
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
        $bookId = $request->input('book_id');
        $existing = Cart::where('user_id', Auth::id())->where('book_id', $bookId)->first();

        if (!$bookId) {
            return back()->with('error', 'Buku tidak ditemukan.');
        }

        if ($existing) {
            $existing->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Buku ditambahkan ke keranjang.');
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
        $cart = Cart::where('user_id', Auth::id())->where('id', $id)->first();
        if ($cart) {
            $cart->delete();
        }
        return redirect()->route('cart.index')->with('success', 'Item dihapus dari keranjang.');
    }
}
