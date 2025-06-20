<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen">

    <nav class="bg-blue-500 p-6 text-white flex justify-between">
        <div class="font-bold text-xl">
            <a href="{{ route('user.books.index') }}">Toko Buku</a>
        </div>

        <div>
            
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
