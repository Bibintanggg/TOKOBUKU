<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex">

    <aside class="w-64 bg-gray-800 text-white h-screen p-4">
        <h2 class="text-xl font-bold mb-4 mt-16 flex flex-col text-center mx-auto">Admin Panel</h2>
        <hr class="w-52 bg-white">
        <ul class="space-y-2 mt-5">
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Dashboard</a>
                <a href="{{ route('admin.books.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Books</a>
                <a href="{{ route('admin.categories.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Categories</a>
                <a href="{{ route('admin.orders.index') }}" class="block py-2 px-4 rounded hover:bg-blue-700">Orders</a>
                <a href="{{ route('logout') }}" class="block py-2 px-4 rounded hover:bg-blue-700"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
        </ul>
    </aside>

    {{-- Content --}}
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-semibold mb-4">@yield('title')</h1>
        @yield('content')
    </main>

</body>
</html>
