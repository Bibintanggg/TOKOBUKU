<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen">

    <nav class="bg-blue-500 p-4 text-white flex justify-between">
        <div class="font-bold text-lg">
            <a href="{{ route('user.books.index') }}">Toko Buku</a>
        </div>
        <div>
            <a class="hover:underline" href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </nav>

    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>
