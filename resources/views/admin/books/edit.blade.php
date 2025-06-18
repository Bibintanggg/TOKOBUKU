@extends('layouts.admin')
@section('title', 'Edit Book')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Book</h1>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block font-medium">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" value="{{ $book->title }}" required>
        </div>

        <div>
            <label class="block font-medium">Category</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($book->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium">Price</label>
            <input type="number" name="price" class="w-full border rounded p-2" value="{{ $book->price }}" required>
        </div>

        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $book->description }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
    </form>
@endsection
