<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-3xl mx-auto px-6">
            <a href="{{ route('order.show', $reservation) }}"
               class="text-sm text-gray-500 hover:text-black">
                ? Kembali ke Status Pesanan
            </a>

            <div class="bg-white border border-gray-200 mt-6 p-8">
                <p class="text-xs text-gray-500 uppercase tracking-wider">
                    Pembayaran Reservasi
                </p>

                <h1 class="text-2xl font-bold mt-2">
                    {{ $reservation->car->brand->name }}
                    {{ $reservation->car->name }}
                </h1>

                <div class="bg-gray-100 p-5 mt-6">
                    <p class="text-xs text-gray-500 uppercase">Total DP</p>
                    <p class="text-2xl font-bold mt-1">
                        Rp {{ number_format($reservation->dp_amount, 0, ',', '.') }}
                    </p>
                </div>

                <form action="{{ route('payment.store', $reservation) }}"
                      method="POST"
                      class="mt-8">
                    @csrf

                    <label class="block text-sm font-semibold mb-3">
                        Metode Pembayaran
                    </label>

                    <div class="space-y-3">
                        @foreach(['Bank Transfer', 'E-Wallet', 'Virtual Account'] as $method)
                            <label class="flex items-center gap-3 border border-gray-200 p-4 cursor-pointer hover:border-black">
                                <input type="radio"
                                       name="method"
                                       value="{{ $method }}"
                                       required>
                                <span>{{ $method }}</span>
                            </label>
                        @endforeach
                    </div>

                    <button type="submit"
                            class="w-full bg-black text-white py-4 mt-6 font-semibold hover:bg-gray-800 transition">
                        Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
