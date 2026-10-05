<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-8">
                <h1 class="text-3xl font-bold mt-2">Status Pesanan</h1>
                <p class="text-gray-500 mt-2">
                    Pantau status reservasi kendaraan Anda.
                </p>
            </div>

            <div class="space-y-4">
                @forelse($orders as $order)
                    <a href="{{ route('order.show', $order) }}"
                       class="block bg-white border border-gray-200 p-6 hover:border-black transition">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider">
                                    {{ $order->reservation_code }}
                                </p>

                                <h2 class="text-lg font-bold mt-1">
                                    {{ $order->car->brand->name }} {{ $order->car->name }}
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>

                            <span class="px-4 py-2 text-xs font-semibold uppercase tracking-wider
                                {{ $order->status === 'Confirmed' ? 'bg-green-100 text-green-700' :
                                   ($order->status === 'Cancelled' ? 'bg-red-100 text-red-700' :
                                   ($order->status === 'Completed' ? 'bg-blue-100 text-blue-700' :
                                   'bg-yellow-100 text-yellow-700')) }}">
                                {{ $order->status }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="bg-white border border-gray-200 p-10 text-center">
                        <h2 class="font-semibold text-lg">Belum ada pesanan</h2>
                        <p class="text-gray-500 mt-2">
                            Reservasi mobil yang Anda buat akan muncul di sini.
                        </p>
                        <a href="{{ route('cars.index') }}"
                           class="inline-block mt-5 bg-black text-white px-6 py-3 text-sm">
                            Lihat Katalog
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
