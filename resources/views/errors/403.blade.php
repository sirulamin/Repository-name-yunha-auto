<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Yunha Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 flex items-center justify-center px-6">
    <main class="w-full max-w-lg text-center">
        <p class="text-xs font-bold tracking-[0.3em] text-gray-400">YUNHA AUTO</p>
        <p class="mt-8 text-7xl font-bold tracking-tight">403</p>
        <h1 class="mt-4 text-2xl font-semibold">Akses Ditolak</h1>
        <p class="mt-3 text-sm leading-6 text-gray-500">Maaf, halaman atau permintaan yang Anda akses tidak dapat diproses saat ini.</p>
        <a href="{{ route('cars.index') }}" class="inline-flex mt-8 bg-black text-white px-6 py-3 text-sm font-semibold">Kembali ke katalog</a>
    </main>
</body>
</html>
