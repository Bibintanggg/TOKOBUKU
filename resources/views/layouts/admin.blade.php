<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Toko Buku Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex font-jakarta">

    <aside class="w-64 bg-gray-900 text-white h-screen p-6 flex flex-col justify-between fixed">
        <div>
            <h2 class="text-2xl font-bold text-center mb-8 tracking-wide"> Admin Panel</h2>
            <ul class="space-y-3 text-sm">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-chart-line w-5"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.books.index') }}"
                        class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-book w-5"></i> Books
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-tags w-5"></i> Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}"
                        class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-box w-5"></i> Orders
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <a href="{{ route('logout') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-red-600 transition text-sm"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt w-5"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </aside>

    {{-- Content --}}
    <main class="flex-1 ml-64 p-6">
        <h1 class="text-2xl font-semibold mb-4">@yield('title')</h1>
        @yield('content')
    </main>

</body>

</html>