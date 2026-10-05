<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-6">
            <a href="{{ route('order.index') }}"
               class="text-sm text-gray-500 hover:text-black">
                ? Kembali ke Status Pesanan
            </a>

            <div class="bg-white border border-gray-200 mt-6 p-8">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider">
                            {{ $reservation->reservation_code }}
                        </p>

                        <h1 class="text-2xl font-bold mt-2">
                            {{ $reservation->car->brand->name }}
                            {{ $reservation->car->name }}
                        </h1>
                    </div>

                    <span class="px-4 py-2 text-xs font-semibold uppercase
                        {{ $reservation->status === 'Confirmed' ? 'bg-green-100 text-green-700' :
                           ($reservation->status === 'Cancelled' ? 'bg-red-100 text-red-700' :
                           ($reservation->status === 'Completed' ? 'bg-blue-100 text-blue-700' :
                           'bg-yellow-100 text-yellow-700')) }}">
                        {{ $reservation->status }}
                    </span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 mt-8">
                    <div>
                        <p class="text-xs text-gray-500 uppercase">Harga Mobil</p>
                        <p class="font-semibold mt-1">
                            Rp {{ number_format($reservation->car->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">DP Reservasi</p>
                        <p class="font-semibold mt-1">
                            Rp {{ number_format($reservation->dp_amount, 0, ',', '.') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Nomor Telepon</p>
                        <p class="font-semibold mt-1">{{ $reservation->phone }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Tanggal Reservasi</p>
                        <p class="font-semibold mt-1">
                            {{ $reservation->preferred_date?->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>

                @if($reservation->notes)
                    <div class="mt-8 border-t pt-6">
                        <p class="text-xs text-gray-500 uppercase">Catatan</p>
                        <p class="mt-2 text-gray-700">{{ $reservation->notes }}</p>
                    </div>
                @endif

                @if($reservation->status === 'Confirmed')
                    @if($reservation->payment?->status === 'Paid')
                        <a href="{{ route('payment.show', $reservation->payment) }}"
                           class="block mt-8 border border-black text-black text-center py-4 font-semibold">
                            Lihat Pembayaran
                        </a>
                    @else
                        <a href="{{ route('payment.create', $reservation) }}"
                           class="block mt-8 bg-black text-white text-center py-4 font-semibold">
                            Lanjut ke Pembayaran
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

