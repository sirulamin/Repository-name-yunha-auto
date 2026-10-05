
<x-app-layout>
    <div style="background:#f5f5f5;min-height:calc(100vh - 65px);padding:40px 24px 70px;">

        <div style="max-width:1000px;margin:auto;">

            <a href="{{ route('cars.show', $car->id) }}"
               style="display:inline-block;margin-bottom:24px;color:#555;text-decoration:none;font-size:14px;">
                ← Kembali ke Detail Mobil
            </a>

            <div style="display:grid;grid-template-columns:0.85fr 1.15fr;gap:24px;align-items:start;">

                {{-- INFORMASI MOBIL --}}
                <div style="background:#111;color:#fff;border-radius:14px;padding:28px;">

                    <h1 style="margin:12px 0 0;font-size:27px;font-weight:800;">
                        Jadwalkan Test Drive
                    </h1>

                    <p style="margin:10px 0 25px;color:#ccc;font-size:14px;line-height:1.7;">
                        Isi formulir untuk mengajukan jadwal mencoba mobil pilihanmu.
                    </p>

                    @php
                        $primaryImage = $car->images->firstWhere('is_primary', true)
                            ?? $car->images->first();
                    @endphp

                    @if ($primaryImage)
                        <img
                            src="{{ asset('storage/' . $primaryImage->image) }}"
                            alt="{{ $car->name }}"
                            style="width:100%;height:190px;object-fit:cover;border-radius:9px;display:block;"
                        >
                    @else
                        <div style="height:190px;background:#292929;border-radius:9px;display:flex;align-items:center;justify-content:center;color:#aaa;">
                            Tidak ada gambar
                        </div>
                    @endif

                    <p style="margin:20px 0 0;color:#bbb;font-size:13px;">
                        {{ $car->brand->name ?? 'Tanpa Brand' }}
                    </p>

                    <h2 style="margin:4px 0 0;font-size:22px;font-weight:700;">
                        {{ $car->name }}
                    </h2>

                    <p style="margin:12px 0 0;font-size:21px;font-weight:800;">
                        Rp {{ number_format($car->price, 0, ',', '.') }}
                    </p>

                    <div style="margin-top:20px;padding-top:18px;border-top:1px solid #444;font-size:13px;color:#ddd;line-height:2;">
                        <div>Tahun: {{ $car->year }}</div>
                        <div>Transmisi: {{ $car->transmission }}</div>
                        <div>Kilometer: {{ number_format($car->mileage, 0, ',', '.') }} km</div>
                    </div>

                </div>

                {{-- FORM --}}
                <div style="background:#fff;border:1px solid #e5e5e5;border-radius:14px;padding:30px;">

                    <h2 style="margin:0;font-size:23px;font-weight:800;color:#111;">
                        Formulir Test Drive
                    </h2>

                    <p style="margin:7px 0 25px;color:#777;font-size:14px;">
                        Lengkapi informasi berikut untuk mengajukan jadwal.
                    </p>

                    @if (session('success'))
                        <div style="margin-bottom:20px;padding:12px 14px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;color:#166534;font-size:14px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div style="margin-bottom:20px;padding:12px 14px;background:#fef2f2;border:1px solid #fecaca;border-radius:8px;color:#b91c1c;font-size:13px;">
                            Periksa kembali data yang kamu masukkan.
                        </div>
                    @endif

                    <form action="{{ route('test-drive.store', $car->id) }}" method="POST">
                        @csrf

                        <div style="margin-bottom:19px;">
                            <label for="date" style="display:block;margin-bottom:7px;font-size:14px;font-weight:600;color:#222;">
                                Tanggal Test Drive <span style="color:#dc2626;">*</span>
                            </label>

                            <input
                                id="date"
                                type="date"
                                name="date"
                                value="{{ old('date') }}"
                                min="{{ date('Y-m-d') }}"
                                required
                                style="display:block;width:100%;box-sizing:border-box;padding:12px;border:1px solid #d5d5d5;border-radius:8px;background:#fff;color:#111;"
                            >

                            @error('date')
                                <p style="margin:6px 0 0;color:#dc2626;font-size:12px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="margin-bottom:19px;">
                            <label for="time" style="display:block;margin-bottom:7px;font-size:14px;font-weight:600;color:#222;">
                                Jam Test Drive <span style="color:#dc2626;">*</span>
                            </label>

                            <input
                                id="time"
                                type="time"
                                name="time"
                                value="{{ old('time') }}"
                                required
                                style="display:block;width:100%;box-sizing:border-box;padding:12px;border:1px solid #d5d5d5;border-radius:8px;background:#fff;color:#111;"
                            >

                            @error('time')
                                <p style="margin:6px 0 0;color:#dc2626;font-size:12px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="margin-bottom:19px;">
                            <label for="phone" style="display:block;margin-bottom:7px;font-size:14px;font-weight:600;color:#222;">
                                Nomor Telepon <span style="color:#dc2626;">*</span>
                            </label>

                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="08xxxxxxxxxx"
                                maxlength="20"
                                required
                                style="display:block;width:100%;box-sizing:border-box;padding:12px;border:1px solid #d5d5d5;border-radius:8px;background:#fff;color:#111;"
                            >

                            @error('phone')
                                <p style="margin:6px 0 0;color:#dc2626;font-size:12px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="margin-bottom:25px;">
                            <label for="notes" style="display:block;margin-bottom:7px;font-size:14px;font-weight:600;color:#222;">
                                Catatan Tambahan
                            </label>

                            <textarea
                                id="notes"
                                name="notes"
                                rows="4"
                                maxlength="500"
                                placeholder="Contoh: Saya ingin mencoba mobil pada sore hari."
                                style="display:block;width:100%;box-sizing:border-box;padding:12px;border:1px solid #d5d5d5;border-radius:8px;background:#fff;color:#111;resize:vertical;"
                            >{{ old('notes') }}</textarea>

                            @error('notes')
                                <p style="margin:6px 0 0;color:#dc2626;font-size:12px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="display:flex;gap:10px;">

                            <a
                                href="{{ route('cars.show', $car->id) }}"
                                style="flex:1;box-sizing:border-box;text-align:center;padding:12px 10px;border:1px solid #d5d5d5;border-radius:8px;color:#333;text-decoration:none;font-size:14px;"
                            >
                                Batal
                            </a>

                            <button
                                type="submit"
                                style="flex:2;padding:12px 10px;border:1px solid #111;border-radius:8px;background:#111;color:#fff;font-size:14px;font-weight:600;cursor:pointer;"
                            >
                                Ajukan Test Drive →
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>