<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen z-[9999vh] overflow-x-hidde font-jakarta">

    <nav class="bg-blue-500 p-6 text-white flex fixed z-50 w-full">
        <div class="justify-between flex w-full ">
            
            <div class="flex">
                <div class="font-bold text-xl">
                <a href="{{ route('user.books.index') }}">Toko Buku</a>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('user.books.index')" :active="request()->routeIs('user.books.index')">
                    {{ __('Home') }}
                </x-nav-link>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                    {{ __('Keranjang Saya') }}
                </x-nav-link>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')">
                    {{ __('Pesanan Saya') }}
                </x-nav-link>
            </div>
        </div>
        <div class="ml-auto">
            <a class="hover:underline" href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>
    </nav>

    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>
