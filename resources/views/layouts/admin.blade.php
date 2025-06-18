<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-gray-800 p-4 text-white flex justify-between">
        <div class="font-bold text-lg">
            <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
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
