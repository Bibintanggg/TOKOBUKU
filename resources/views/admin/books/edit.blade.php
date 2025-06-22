@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Edit Book</h1>

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" value="{{ $book->title }}"
                    class="w-full border border-gray-300 focus:ring focus:ring-blue-200 rounded-lg p-3 text-gray-800"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id"
                    class="w-full border border-gray-300 focus:ring focus:ring-blue-200 rounded-lg p-3 text-gray-800"
                    required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($book->category_id == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Price (IDR)</label>
                <input type="number" name="price" value="{{ $book->price }}"
                    class="w-full border border-gray-300 focus:ring focus:ring-blue-200 rounded-lg p-3 text-gray-800"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 focus:ring focus:ring-blue-200 rounded-lg p-3 text-gray-800">{{ $book->description }}</textarea>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="inline-block bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-2 px-5 rounded-lg">
                    Update Book
                </button>
            </div>
        </form>
    </div>
@endsection