@extends('layouts.admin')
@section('title', 'Add Book')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New Book</h1>

    <form action="{{ route('admin.books.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block font-medium">Title</label>
        <input type="text" name="title" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium">Author</label>
        <input type="text" name="author" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium">Category</label>
        <select name="category_id" class="w-full border rounded p-2" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium">Price</label>
        <input type="number" name="price" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium">Stock</label>
        <input type="number" name="stock" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-medium">Description</label>
        <textarea name="description" class="w-full border rounded p-2"></textarea>
    </div>

    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Save</button>
</form>
`
@endsection
