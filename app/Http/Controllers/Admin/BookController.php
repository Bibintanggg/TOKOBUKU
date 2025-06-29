<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::with('category')->get();
        $query = Book::with('category');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
        }
    
        $books = $query->get();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover'=> 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable'
        ]);
    
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path('covers'), $coverName);
    
            $validated['cover'] = $coverName;
        }
    
        Book::create($validated);
    
        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
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
     public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable'
        ]);

        $book->update($validated);
        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil dihapus.');
    }
}