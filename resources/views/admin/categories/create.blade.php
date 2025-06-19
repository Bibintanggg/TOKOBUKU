@extends('layouts.admin')
@section('title', 'Add Categories')
    
@section('content')
    
<form method="POST" action="{{ route('admin.categories.store') }}">
    @csrf
    <label>Nama Kategori:</label>
    <input type="text" name="name" required class="border p-2 rounded">
    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
</form>
@endsection
