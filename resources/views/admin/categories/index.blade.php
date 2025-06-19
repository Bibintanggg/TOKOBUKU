@extends('layouts.admin')
@section('title', 'Categories')

@section('content')

    <div class=" justify-center mb-4">
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded inline-block">Add Category</a>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border text-center">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="align-middle">
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $category->name }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
