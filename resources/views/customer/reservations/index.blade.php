<x-app-layout>

<main class="bg-[#f7f7f5] min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-6">

        <h1 class="mt-3 text-4xl font-semibold">Reservasi Saya</h1>

        @if($reservations->isEmpty())

            <div class="mt-8 bg-white p-10 text-center">
                <p class="text-gray-500">Belum ada reservasi kendaraan.</p>

                <a href="{{ route('cars.index') }}"
                   class="inline-block mt-5 px-6 py-3 bg-black text-white text-xs uppercase font-semibold">
                    Lihat Katalog
                </a>
            </div>

        @else

            <div class="mt-8 space-y-4">

                @foreach($reservations as $reservation)

                    <a href="{{ route('reservation.show',$reservation) }}"
                       class="block bg-white p-6 hover:shadow-md transition">

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                            <div>
                                <p class="text-xs text-gray-400">
                                    {{ $reservation->reservation_code }}
                                </p>

                                <h2 class="mt-2 text-xl font-semibold">
                                    {{ $reservation->car->name }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $reservation->car->brand->name ?? '' }}
                                </p>
                            </div>

                            <div class="text-left md:text-right">

                                <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 text-[10px] font-semibold uppercase">
                                    {{ $reservation->status }}
                                </span>

                                <p class="mt-2 text-sm text-gray-500">
                                    DP {{ $reservation->dp_percent }}%
                                </p>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>

        @endif

    </div>
</main>

</x-app-layout>
