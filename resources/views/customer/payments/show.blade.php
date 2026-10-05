<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white border border-gray-200 p-8 text-center">
                <div class="w-14 h-14 bg-gray-100 text-gray-700 rounded-full flex items-center justify-center mx-auto text-2xl">
                    {{ $payment->status === 'Paid' ? '✓' : '…' }}
                </div>

                <p class="text-xs text-gray-500 uppercase tracking-wider mt-6">
                    {{ $payment->status === 'Paid' ? 'Pembayaran Terverifikasi' : 'Instruksi Pembayaran' }}
                </p>

                <h1 class="text-3xl font-bold mt-2">
                    {{ $payment->status === 'Paid' ? 'Pembayaran Berhasil' : 'Menunggu Verifikasi' }}
                </h1>

                <p class="text-gray-500 mt-2">
                    {{ $payment->status === 'Paid'
                        ? 'Pembayaran reservasi Anda telah diverifikasi oleh admin.'
                        : 'Pembayaran Anda tercatat dan masih menunggu verifikasi admin.' }}
                </p>

                <div class="bg-gray-100 p-6 mt-8 text-left space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 uppercase">Kode Pembayaran</p>
                        <p class="font-semibold mt-1">{{ $payment->payment_code }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Mobil</p>
                        <p class="font-semibold mt-1">
                            {{ $payment->reservation->car->brand->name }}
                            {{ $payment->reservation->car->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Jumlah</p>
                        <p class="font-semibold mt-1">
                            Rp {{ number_format($payment->amount, 0, ',', '.') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Metode</p>
                        <p class="font-semibold mt-1">{{ $payment->method }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase">Status</p>
                        <span class="inline-block mt-1 px-3 py-1 {{ $payment->status === 'Paid' ? 'bg-green-100 text-green-700' : ($payment->status === 'Cancelled' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }} text-xs font-semibold">
                            {{ $payment->status }}
                        </span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 mt-8">
                    <a href="{{ route('order.show', $payment->reservation) }}"
                       class="flex-1 border border-black py-3 font-semibold">
                        Lihat Pesanan
                    </a>

                    <a href="{{ route('cars.index') }}"
                       class="flex-1 bg-black text-white py-3 font-semibold">
                        Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
