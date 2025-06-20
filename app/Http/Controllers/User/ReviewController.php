<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'review' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'review' => $request->review,
        ]);

        // Ambil ulang datanya supaya review baru langsung kelihatan
        return redirect()->route('user.books.show', $request->book_id);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::with(['category', 'reviews.user'])->findOrFail($id);
        return view('user.books.show', compact('book'));
    } //
    

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
