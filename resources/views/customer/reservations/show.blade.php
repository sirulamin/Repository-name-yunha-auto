<x-app-layout>

<main class="bg-[#f7f7f5] min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-6">

        @if(session('success'))
            <div class="mb-6 bg-black text-white px-5 py-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-8 md:p-10">

            <p class="text-[10px] uppercase tracking-[0.25em] text-gray-400">
                Reservation
            </p>

            <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-semibold">Reservasi Berhasil</h1>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $reservation->reservation_code }}
                    </p>
                </div>

                <span class="px-4 py-2 bg-yellow-100 text-yellow-800 text-xs font-semibold uppercase">
                    {{ $reservation->status }}
                </span>
            </div>

            <div class="mt-8 grid md:grid-cols-2 gap-6 border-t border-gray-200 pt-8">

                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400">Kendaraan</p>
                    <p class="mt-2 font-semibold">{{ $reservation->car->name }}</p>
                    <p class="text-sm text-gray-500">
                        {{ $reservation->car->brand->name ?? '' }}
                    </p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400">Nomor Telepon</p>
                    <p class="mt-2 font-semibold">{{ $reservation->phone }}</p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400">Tanggal</p>
                    <p class="mt-2 font-semibold">
                        {{ $reservation->preferred_date ? $reservation->preferred_date->format('d M Y') : 'Belum ditentukan' }}
                    </p>
                </div>

                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400">Uang Muka</p>
                    <p class="mt-2 font-semibold">{{ $reservation->dp_percent }}%</p>
                    <p class="text-sm text-gray-500">
                        Rp {{ number_format($reservation->dp_amount,0,',','.') }}
                    </p>
                </div>

            </div>

            @if($reservation->notes)
                <div class="mt-8 bg-gray-50 p-5">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400">Catatan</p>
                    <p class="mt-2 text-sm text-gray-600">{{ $reservation->notes }}</p>
                </div>
            @endif

            <div class="mt-8 pt-6 border-t border-gray-200 flex flex-wrap gap-3">

                <a href="{{ route('reservation.index') }}"
                   class="px-6 py-3 bg-black text-white text-xs font-semibold uppercase tracking-[0.12em]">
                    Semua Reservasi
                </a>

                <a href="{{ route('cars.show',$reservation->car) }}"
                   class="px-6 py-3 border border-gray-300 text-xs font-semibold uppercase tracking-[0.12em]">
                    Kembali ke Mobil
                </a>

            </div>

        </div>
    </div>
</main>

</x-app-layout>
