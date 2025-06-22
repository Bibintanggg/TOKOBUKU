<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Selamat Datang di Toko Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800 font-sans">

    <section
        class="bg-gradient-to-r from-blue-600 to-blue-800 text-white min-h-screen flex flex-col justify-center items-center px-6 text-center relative overflow-hidden">
        <div class="absolute -top-10 -left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 -right-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

        <h1 class="text-4xl md:text-5xl font-bold mb-4 z-10">
            <i class="fa-solid fa-book"></i> Selamat Datang di <span class="text-yellow-300">Toko Buku Online</span>
        </h1>
        <p class="text-lg md:text-xl max-w-2xl mb-6 z-10">
            Jelajahi koleksi buku terbaik kami, mulai dari buku pelajaran, novel inspiratif, hingga bacaan santai.
            Temukan dan beli dengan mudah!
        </p>
        <div class="flex gap-4 z-10 flex-wrap justify-center">
            <a href="{{ route('login') }}"
                class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-semibold px-6 py-2 rounded-full shadow">
                Masuk
            </a>
            <a href="{{ route('register') }}"
                class="bg-white text-blue-800 hover:bg-blue-100 font-semibold px-6 py-2 rounded-full shadow">
                Daftar
            </a>
        </div>
    </section>

    <section class="py-16 px-6 bg-gray-50 text-center">
        <h2 class="text-3xl font-bold mb-6">Kenapa Belanja di Sini?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto text-left">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="fa-solid fa-truck text-3xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Pengiriman Cepat</h3>
                <p class="text-sm text-gray-600">Kami mengirimkan pesananmu dengan cepat dan aman ke seluruh Indonesia.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="fa-solid fa-tags text-3xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Harga Terjangkau</h3>
                <p class="text-sm text-gray-600">Nikmati harga spesial untuk semua buku favoritmu tanpa menguras dompet.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <i class="fa-solid fa-book-open text-3xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Koleksi Lengkap</h3>
                <p class="text-sm text-gray-600">Kami menyediakan ribuan buku dari berbagai kategori yang bisa kamu
                    pilih.</p>
            </div>
        </div>
    </section>

    <footer class="bg-blue-900 text-white text-center py-4">
        <p class="text-sm">© {{ date('Y') }} Toko Buku Online. All rights reserved.</p>
        <span class="text-sm">Kelompok Naufal,Cantika dan Irfa</span>
    </footer>

</body>

</html>