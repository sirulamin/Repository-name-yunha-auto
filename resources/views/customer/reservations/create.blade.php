<x-app-layout>

<main class="bg-[#f7f7f5] min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-6">

        <a href="{{ route('cars.show',$car) }}"
           class="text-[11px] uppercase tracking-[0.18em] text-gray-500 hover:text-black">
            ← Kembali ke mobil
        </a>

        <div class="mt-8 grid lg:grid-cols-2 gap-8">

            <div class="bg-white p-8">
                <p class="text-[10px] uppercase tracking-[0.25em] text-gray-400">
                    Reservasi Kendaraan
                </p>

                <h1 class="mt-4 text-3xl font-semibold text-gray-950">
                    {{ $car->name }}
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    {{ $car->brand->name ?? 'Tanpa Brand' }}
                </p>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400">
                        Harga
                    </p>

                    <p class="mt-2 text-2xl font-semibold">
                        Rp {{ number_format($car->price,0,',','.') }}
                    </p>
                </div>

                <div class="mt-6 bg-gray-50 p-5">
                    <p class="text-xs font-semibold">
                        Setelah reservasi
                    </p>

                    <p class="mt-2 text-xs leading-6 text-gray-500">
                        Tim Yunha Auto akan menghubungi Anda untuk konfirmasi unit
                        dan proses selanjutnya.
                    </p>
                </div>
            </div>

            <div class="bg-[#0a0a0a] text-white p-8">

                <h2 class="text-2xl font-semibold">
                    Data Reservasi
                </h2>

                <p class="mt-2 text-sm text-gray-400">
                    Isi data berikut untuk mengajukan reservasi.
                </p>

                <form action="{{ route('reservation.store',$car) }}"
                      method="POST"
                      class="mt-8 space-y-6">

                    @csrf

                    <div>
                        <label class="block text-xs uppercase tracking-[0.15em] text-gray-400 mb-2">
                            Nomor Telepon
                        </label>

                        <input type="text"
                               name="phone"
                               value="{{ old('phone',auth()->user()->phone) }}"
                               required
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-3 text-sm focus:border-white focus:ring-0">

                        @error('phone')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-[0.15em] text-gray-400 mb-2">
                            Tanggal yang Diinginkan
                        </label>

                        <input type="date"
                               name="preferred_date"
                               value="{{ old('preferred_date') }}"
                               min="{{ date('Y-m-d') }}"
                               class="w-full bg-white/5 border border-white/10 text-white px-4 py-3 text-sm focus:border-white focus:ring-0">

                        @error('preferred_date')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-[0.15em] text-gray-400 mb-2">
                            Uang Muka
                        </label>

                        <select name="dp_percent"
                                class="w-full bg-white/5 border border-white/10 text-white px-4 py-3 text-sm focus:border-white focus:ring-0">

                            @foreach([10,20,30,40,50,60,70,80] as $dp)
                                <option value="{{ $dp }}"
                                        class="text-black"
                                        {{ old('dp_percent',20) == $dp ? 'selected' : '' }}>
                                    {{ $dp }}%
                                </option>
                            @endforeach

                        </select>

                        @error('dp_percent')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-[0.15em] text-gray-400 mb-2">
                            Catatan
                        </label>

                        <textarea name="notes"
                                  rows="3"
                                  placeholder="Contoh: Saya ingin melihat unit terlebih dahulu."
                                  class="w-full bg-white/5 border border-white/10 text-white px-4 py-3 text-sm focus:border-white focus:ring-0">{{ old('notes') }}</textarea>

                        @error('notes')
                            <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full bg-white text-black py-4 text-xs font-semibold uppercase tracking-[0.14em] hover:bg-gray-200 transition">
                        Ajukan Reservasi →
                    </button>

                </form>

            </div>

        </div>
    </div>
</main>

</x-app-layout>
