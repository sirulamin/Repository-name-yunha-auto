<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Yunha Auto') }}</title>

        <style>[x-cloak] { display: none !important; }</style>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">

            @include('layouts.navigation')

            <main>
                {{ $slot }}
            </main>

            {{-- YUNHA AUTO GLOBAL FOOTER --}}
@if(auth()->check() && auth()->user()->role === 'customer')

<footer class="bg-[#0a0a0a] text-white mt-20">

    <div class="max-w-7xl mx-auto px-6 sm:px-8 py-14">

        {{-- TOP --}}
        <div class="flex flex-col md:flex-row md:justify-between gap-10 pb-12 border-b border-white/10">

            <div class="max-w-sm">
                <h2 class="text-2xl font-semibold tracking-[0.18em]">
                    YUNHA AUTO
                </h2>

                <p class="mt-4 text-sm leading-6 text-gray-400">
                    Showroom kendaraan pilihan dengan pengalaman digital
                    yang sederhana, modern, dan terpercaya.
                </p>

                <p class="mt-4 text-xs uppercase tracking-[0.18em] text-gray-500">
                    Surabaya, Indonesia
                </p>
            </div>

            <div>
                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500 mb-4">
                    Explore
                </p>

                <div class="flex flex-wrap gap-x-8 gap-y-3 text-sm text-gray-300">
                    <a href="{{ route('cars.index') }}" class="hover:text-white transition">
                        Katalog Mobil
                    </a>

                    <a href="{{ route('wishlist.index') }}" class="hover:text-white transition">
                        Wishlist
                    </a>

                    <a href="{{ route('test-drive.index') }}" class="hover:text-white transition">
                        Test Drive
                    </a>

                    <a href="{{ route('reservation.index') }}" class="hover:text-white transition">
                        Reservasi
                    </a>
                    <a href="{{ route('order.index') }}" class="hover:text-white transition">
                        Status Pesanan
                    </a>

                    <a href="{{ route('profile.edit') }}" class="hover:text-white transition">
                        Profile
                    </a>
                </div>
            </div>

        </div>


        {{-- LINKS --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 py-12">

            <div>
                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500 mb-5">
                    Racing
                </p>

                <div class="space-y-3 text-sm text-gray-400">
                    <p>Yunha Motorsport</p>
                    <p>Track Performance</p>
                    <p>Racing Program</p>
                    <p>Driver Program</p>
                </div>
            </div>

            <div>
                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500 mb-5">
                    Sports Cars
                </p>

                <div class="space-y-3 text-sm text-gray-400">
                    <p>Explore Cars</p>
                    <p>New Arrivals</p>
                    <p>Pre-owned</p>
                    <p>Featured Collection</p>
                </div>
            </div>

            <div>
                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500 mb-5">
                    Experiences
                </p>

                <div class="space-y-3 text-sm text-gray-400">
                    <p>Showroom</p>
                    <p>Automotive Events</p>
                    <p>Yunha Experience</p>
                    <p>Customer Stories</p>
                </div>
            </div>

            <div>
                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500 mb-5">
                    About Us
                </p>

                <div class="space-y-3 text-sm text-gray-400">
                    <p>Our Story</p>
                    <p>News</p>
                    <p>Sustainability</p>
                    <p>Contact</p>
                </div>
            </div>

        </div>


        {{-- SOCIAL --}}
        <div class="py-8 border-t border-white/10 border-b border-white/10
                    flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div>
                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500">
                    Connect with Yunha Auto
                </p>

                <p class="mt-2 text-sm text-gray-400">
                    Follow our latest automotive stories.
                </p>
            </div>

            <div class="flex gap-6 text-sm text-gray-300">
                <span>Instagram</span>
                <span>Facebook</span>
                <span>YouTube</span>
                <span>TikTok</span>
            </div>

        </div>


        {{-- BOTTOM --}}
        <div class="pt-7 flex flex-col md:flex-row md:items-center
                    md:justify-between gap-4 text-xs text-gray-500">

            <div>
                &copy; {{ date('Y') }} Yunha Auto. All rights reserved.
            </div>

            <div class="flex flex-wrap gap-5">
                <span>Privacy Policy</span>
                <span>Cookie Policy</span>
                <span>Accessibility</span>
                <span>Contact</span>
            </div>

        </div>

    </div>

</footer>

@endif
</div>

    </body>
</html>








