<x-app-layout>

    <div class="bg-white">

        <section class="border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

                <div class="flex items-end justify-between gap-6">

                    <div>
                        <h1 class="mt-3 text-4xl font-semibold tracking-tight text-gray-950">
                            Compare Mobil
                        </h1>

                        <p class="mt-3 text-sm text-gray-500 max-w-xl">
                            Bandingkan spesifikasi kendaraan sebelum menentukan pilihan.
                        </p>
                    </div>

                    <a href="{{ route('cars.index') }}"
                       class="text-xs font-medium text-gray-600 hover:text-black transition">
                        Kembali ke katalog
                    </a>

                </div>

            </div>
        </section>


        <section class="max-w-7xl mx-auto px-6 lg:px-8 py-14">

            @if($cars->count() < 2)

                <div class="border border-gray-200 p-12 text-center">

                    <h2 class="text-xl font-semibold text-gray-950">
                        Pilih minimal 2 mobil
                    </h2>

                    <p class="mt-3 text-sm text-gray-500">
                        Pilih minimal dua kendaraan untuk dibandingkan.
                    </p>

                    <a href="{{ route('cars.index') }}"
                       class="inline-flex mt-7 px-6 py-3 bg-black text-white text-xs font-medium hover:bg-gray-800 transition">
                        Pilih Mobil
                    </a>

                </div>

            @else

                <div class="overflow-x-auto border border-gray-200">

                    <table class="w-full min-w-[760px] border-collapse">

                        <thead>

                            <tr class="bg-gray-50">

                                <th class="w-48 p-6 text-left text-[10px] uppercase tracking-[0.2em] text-gray-500 border-r border-gray-200">
                                    Spesifikasi
                                </th>

                                @foreach($cars as $car)

                                    <th class="p-6 text-left border-r border-gray-200">

                                        <div class="text-[10px] uppercase tracking-[0.18em] text-gray-400">
                                            {{ $car->brand->name ?? 'Brand' }}
                                        </div>

                                        <div class="mt-2 text-xl font-semibold text-gray-950">
                                            {{ $car->name }}
                                        </div>

                                        <div class="mt-2 text-sm font-medium text-gray-700">
                                            Rp {{ number_format($car->price, 0, ',', '.') }}
                                        </div>

                                    </th>

                                @endforeach

                            </tr>

                        </thead>


                        <tbody class="text-sm">

                            <tr class="border-t border-gray-200">

                                <td class="p-5 font-medium text-gray-500 border-r border-gray-200">
                                    Brand
                                </td>

                                @foreach($cars as $car)

                                    <td class="p-5 border-r border-gray-200">
                                        {{ $car->brand->name ?? '-' }}
                                    </td>

                                @endforeach

                            </tr>


                            <tr class="border-t border-gray-200 bg-gray-50/50">

                                <td class="p-5 font-medium text-gray-500 border-r border-gray-200">
                                    Tahun
                                </td>

                                @foreach($cars as $car)

                                    <td class="p-5 border-r border-gray-200">
                                        {{ $car->year ?? '-' }}
                                    </td>

                                @endforeach

                            </tr>


                            <tr class="border-t border-gray-200">

                                <td class="p-5 font-medium text-gray-500 border-r border-gray-200">
                                    Transmisi
                                </td>

                                @foreach($cars as $car)

                                    <td class="p-5 border-r border-gray-200">
                                        {{ $car->transmission ?? '-' }}
                                    </td>

                                @endforeach

                            </tr>


                            <tr class="border-t border-gray-200 bg-gray-50/50">

                                <td class="p-5 font-medium text-gray-500 border-r border-gray-200">
                                    Mileage
                                </td>

                                @foreach($cars as $car)

                                    <td class="p-5 border-r border-gray-200">
                                        {{ number_format($car->mileage ?? 0, 0, ',', '.') }} km
                                    </td>

                                @endforeach

                            </tr>


                            <tr class="border-t border-gray-200">

                                <td class="p-5 font-medium text-gray-500 border-r border-gray-200">
                                    Aksi
                                </td>

                                @foreach($cars as $car)

                                    <td class="p-5 border-r border-gray-200">

                                        <a href="{{ route('cars.show', $car) }}"
                                           class="inline-flex px-4 py-2 bg-black text-white text-xs font-medium hover:bg-gray-800 transition">
                                            Lihat Detail
                                        </a>

                                    </td>

                                @endforeach

                            </tr>

                        </tbody>

                    </table>

                </div>

            @endif

        </section>

    </div>

</x-app-layout>
