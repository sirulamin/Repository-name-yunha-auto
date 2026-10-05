<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ auth()->user()?->role === 'admin' ? route('admin.dashboard') : route('cars.index') }}" class="font-bold text-xl tracking-tight text-gray-900">
                YUNHA AUTO
            </a>

            <div class="hidden md:flex items-center gap-6 text-sm">
                @if(auth()->user()?->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-black">Admin Dashboard</a>
                @else
                    <a href="{{ route('cars.index') }}" class="{{ request()->routeIs('cars.*') ? 'text-black font-semibold' : 'text-gray-600 hover:text-black' }}">Katalog Mobil</a>
                    <a href="{{ route('wishlist.index') }}" class="{{ request()->routeIs('wishlist.*') ? 'text-black font-semibold' : 'text-gray-600 hover:text-black' }}">Wishlist</a>
                    <a href="{{ route('test-drive.index') }}" class="{{ request()->routeIs('test-drive.*') ? 'text-black font-semibold' : 'text-gray-600 hover:text-black' }}">Test Drive</a>
                    <a href="{{ route('reservation.index') }}" class="{{ request()->routeIs('reservation.*') ? 'text-black font-semibold' : 'text-gray-600 hover:text-black' }}">Reservasi</a>
                    <a href="{{ route('order.index') }}" class="{{ request()->routeIs('order.*', 'payment.*') ? 'text-black font-semibold' : 'text-gray-600 hover:text-black' }}">Pesanan</a>
                @endif

                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'text-black font-semibold' : 'text-gray-600 hover:text-black' }}">Profile</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-black">Logout</button>
                </form>
            </div>

            <button @click="open = !open" class="md:hidden p-2 text-gray-600" aria-label="Buka menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div x-show="open" x-cloak class="md:hidden border-t border-gray-100 py-3 space-y-1">
            @if(auth()->user()?->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-sm text-gray-700">Admin Dashboard</a>
            @else
                <a href="{{ route('cars.index') }}" class="block px-3 py-2 text-sm text-gray-700">Katalog Mobil</a>
                <a href="{{ route('wishlist.index') }}" class="block px-3 py-2 text-sm text-gray-700">Wishlist</a>
                <a href="{{ route('test-drive.index') }}" class="block px-3 py-2 text-sm text-gray-700">Test Drive</a>
                <a href="{{ route('reservation.index') }}" class="block px-3 py-2 text-sm text-gray-700">Reservasi</a>
                <a href="{{ route('order.index') }}" class="block px-3 py-2 text-sm text-gray-700">Pesanan</a>
            @endif
            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-gray-700">Profile</a>
            <form method="POST" action="{{ route('logout') }}" class="px-3 pt-1">
                @csrf
                <button type="submit" class="text-sm text-gray-700">Logout</button>
            </form>
        </div>
    </div>
</nav>
