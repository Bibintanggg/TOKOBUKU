<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 text-white flex flex-col">
            <div class="p-4 text-2xl font-bold border-b border-blue-600">
                Admin Panel
            </div>

            <nav class="flex-1 p-4 space-y-2">
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
            </nav>
        </div>

        
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-semibold mb-6">Admin dashboard</h1>


            <div class="bg-white p-6 rounded shadow">
                
            </div>
        </div>

    </div>

</body>
</html>
