<x-app-layout>

    <x-slot name="header">
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <div>
                <h2 style="font-size:20px;font-weight:700;color:#111;margin:0;">
                    Edit Mobil
                </h2>
                <p style="font-size:13px;color:#6b7280;margin:4px 0 0;">
                    Perbarui informasi kendaraan
                </p>
            </div>

            <a href="{{ route('admin.cars.index') }}"
               style="
                    display:inline-flex;
                    align-items:center;
                    gap:6px;
                    padding:9px 14px;
                    border:1px solid #d1d5db;
                    border-radius:8px;
                    background:#fff;
                    color:#374151;
                    text-decoration:none;
                    font-size:13px;
                    font-weight:600;
               ">
                ← Kembali
            </a>
        </div>
    </x-slot>


    <div style="
        min-height:calc(100vh - 65px);
        background:#f5f5f5;
        padding:30px 20px 50px;
    ">

        <div style="
            max-width:1180px;
            margin:0 auto;
        ">

            {{-- PAGE TITLE --}}
            <div style="margin-bottom:22px;">
                <div style="
                    font-size:13px;
                    color:#6b7280;
                    margin-bottom:5px;
                ">
                    Manajemen Mobil
                </div>

                <h1 style="
                    margin:0;
                    font-size:28px;
                    line-height:1.2;
                    font-weight:800;
                    color:#111827;
                ">
                    Edit {{ $car->name }}
                </h1>

                <p style="
                    margin:7px 0 0;
                    font-size:14px;
                    color:#6b7280;
                ">
                    Ubah informasi mobil yang diperlukan tanpa perlu mengisi ulang data lainnya.
                </p>
            </div>


            {{-- ERROR --}}
            @if ($errors->any())
                <div style="
                    background:#fef2f2;
                    border:1px solid #fecaca;
                    color:#991b1b;
                    border-radius:10px;
                    padding:14px 16px;
                    margin-bottom:20px;
                    font-size:13px;
                ">
                    <div style="font-weight:700;margin-bottom:6px;">
                        Terdapat kesalahan:
                    </div>

                    <ul style="margin:0;padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{-- SUCCESS --}}
            @if (session('success'))
                <div style="
                    background:#f0fdf4;
                    border:1px solid #bbf7d0;
                    color:#166534;
                    border-radius:10px;
                    padding:14px 16px;
                    margin-bottom:20px;
                    font-size:13px;
                ">
                    {{ session('success') }}
                </div>
            @endif


            {{-- FORM --}}
            <form
                action="{{ route('admin.cars.update', $car) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                {{-- MAIN GRID --}}
                <div style="
                    display:grid;
                    grid-template-columns:minmax(0, 1.45fr) minmax(320px, .8fr);
                    gap:22px;
                    align-items:start;
                ">


                    {{-- =========================
                         LEFT : INFORMATION
                    ========================== --}}
                    <div style="
                        background:#fff;
                        border:1px solid #e5e7eb;
                        border-radius:14px;
                        overflow:hidden;
                    ">

                        {{-- SECTION HEADER --}}
                        <div style="
                            padding:20px 22px;
                            border-bottom:1px solid #e5e7eb;
                        ">
                            <h3 style="
                                margin:0;
                                font-size:17px;
                                font-weight:750;
                                color:#111827;
                            ">
                                Informasi Mobil
                            </h3>

                            <p style="
                                margin:5px 0 0;
                                color:#6b7280;
                                font-size:13px;
                            ">
                                Perbarui detail kendaraan.
                            </p>
                        </div>


                        <div style="padding:22px;">

                            {{-- NAMA + BRAND --}}
                            <div class="edit-grid-2">

                                <div>
                                    <label class="edit-label">
                                        Nama Mobil
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $car->name) }}"
                                        class="edit-input"
                                        required
                                    >
                                </div>


                                <div>
                                    <label class="edit-label">
                                        Brand
                                    </label>

                                    <select
                                        name="brand_id"
                                        class="edit-input"
                                        required
                                    >
                                        <option value="">
                                            -- Pilih Brand --
                                        </option>

                                        @foreach ($brands as $brand)
                                            <option
                                                value="{{ $brand->id }}"
                                                {{ old('brand_id', $car->brand_id) == $brand->id ? 'selected' : '' }}
                                            >
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            {{-- TAHUN + HARGA --}}
                            <div class="edit-grid-2">

                                <div>
                                    <label class="edit-label">
                                        Tahun
                                    </label>

                                    <input
                                        type="number"
                                        name="year"
                                        value="{{ old('year', $car->year) }}"
                                        class="edit-input"
                                        required
                                    >
                                </div>


                                <div>
                                    <label class="edit-label">
                                        Harga
                                    </label>

                                    <div style="position:relative;">
                                        <span style="
                                            position:absolute;
                                            left:12px;
                                            top:50%;
                                            transform:translateY(-50%);
                                            color:#6b7280;
                                            font-size:13px;
                                        ">
                                            Rp
                                        </span>

                                        <input
                                            type="number"
                                            name="price"
                                            value="{{ old('price', $car->price) }}"
                                            class="edit-input"
                                            style="padding-left:38px;"
                                            required
                                        >
                                    </div>
                                </div>

                            </div>


                            {{-- KILOMETER + STATUS --}}
                            <div class="edit-grid-2">

                                <div>
                                    <label class="edit-label">
                                        Kilometer
                                    </label>

                                    <div style="position:relative;">
                                        <input
                                            type="number"
                                            name="mileage"
                                            value="{{ old('mileage', $car->mileage) }}"
                                            class="edit-input"
                                            style="padding-right:65px;"
                                            min="0"
                                            required
                                        >

                                        <span style="
                                            position:absolute;
                                            right:12px;
                                            top:50%;
                                            transform:translateY(-50%);
                                            color:#6b7280;
                                            font-size:12px;
                                        ">
                                            KM
                                        </span>
                                    </div>
                                </div>


                                <div>
                                    <label class="edit-label">
                                        Status
                                    </label>

                                    <select
                                        name="status"
                                        class="edit-input"
                                        required
                                    >
                                        <option
                                            value="Available"
                                            {{ old('status', $car->status) == 'Available' ? 'selected' : '' }}
                                        >
                                            Available
                                        </option>

                                        <option
                                            value="Booked"
                                            {{ old('status', $car->status) == 'Booked' ? 'selected' : '' }}
                                        >
                                            Booked
                                        </option>

                                        <option
                                            value="Sold"
                                            {{ old('status', $car->status) == 'Sold' ? 'selected' : '' }}
                                        >
                                            Sold
                                        </option>
                                    </select>
                                </div>

                            </div>


                            {{-- TRANSMISI + BAHAN BAKAR --}}
                            <div class="edit-grid-2">

                                <div>
                                    <label class="edit-label">
                                        Transmisi
                                    </label>

                                    <select
                                        name="transmission"
                                        class="edit-input"
                                        required
                                    >
                                        <option value="">
                                            -- Pilih Transmisi --
                                        </option>

                                        <option
                                            value="Manual"
                                            {{ old('transmission', $car->transmission) == 'Manual' ? 'selected' : '' }}
                                        >
                                            Manual
                                        </option>

                                        <option
                                            value="Automatic"
                                            {{ old('transmission', $car->transmission) == 'Automatic' ? 'selected' : '' }}
                                        >
                                            Automatic
                                        </option>
                                    </select>
                                </div>


                                <div>
                                    <label class="edit-label">
                                        Bahan Bakar
                                    </label>

                                    <select
                                        name="fuel"
                                        class="edit-input"
                                        required
                                    >
                                        <option value="">
                                            -- Pilih Bahan Bakar --
                                        </option>

                                        <option
                                            value="Bensin"
                                            {{ old('fuel', $car->fuel) == 'Bensin' ? 'selected' : '' }}
                                        >
                                            Bensin
                                        </option>

                                        <option
                                            value="Diesel"
                                            {{ old('fuel', $car->fuel) == 'Diesel' ? 'selected' : '' }}
                                        >
                                            Diesel
                                        </option>

                                        <option
                                            value="Hybrid"
                                            {{ old('fuel', $car->fuel) == 'Hybrid' ? 'selected' : '' }}
                                        >
                                            Hybrid
                                        </option>

                                        <option
                                            value="Electric"
                                            {{ old('fuel', $car->fuel) == 'Electric' ? 'selected' : '' }}
                                        >
                                            Electric
                                        </option>
                                    </select>
                                </div>

                            </div>


                            {{-- WARNA + KONDISI --}}
                            <div class="edit-grid-2">

                                <div>
                                    <label class="edit-label">
                                        Warna
                                    </label>

                                    <input
                                        type="text"
                                        name="color"
                                        value="{{ old('color', $car->color) }}"
                                        class="edit-input"
                                        required
                                    >
                                </div>


                                <div>
                                    <label class="edit-label">
                                        Kondisi
                                    </label>

                                    <select
                                        name="condition"
                                        class="edit-input"
                                        required
                                    >
                                        <option value="">
                                            -- Pilih Kondisi --
                                        </option>

                                        <option
                                            value="Baru"
                                            {{ old('condition', $car->condition) == 'Baru' ? 'selected' : '' }}
                                        >
                                            Baru
                                        </option>

                                        <option
                                            value="Bekas"
                                            {{ old('condition', $car->condition) == 'Bekas' ? 'selected' : '' }}
                                        >
                                            Bekas
                                        </option>
                                    </select>
                                </div>

                            </div>


                            {{-- DESKRIPSI --}}
                            <div style="margin-top:20px;">

                                <label class="edit-label">
                                    Deskripsi
                                </label>

                                <textarea
                                    name="description"
                                    rows="6"
                                    class="edit-input"
                                    style="resize:vertical;"
                                    placeholder="Tuliskan deskripsi mobil..."
                                >{{ old('description', $car->description) }}</textarea>

                            </div>

                        </div>
                    </div>



                    {{-- =========================
                         RIGHT : PHOTO
                    ========================== --}}
                    <div>

                        <div style="
                            background:#fff;
                            border:1px solid #e5e7eb;
                            border-radius:14px;
                            overflow:hidden;
                        ">

                            <div style="
                                padding:20px;
                                border-bottom:1px solid #e5e7eb;
                            ">
                                <div style="
                                    display:flex;
                                    align-items:center;
                                    justify-content:space-between;
                                    gap:10px;
                                ">
                                    <div>
                                        <h3 style="
                                            margin:0;
                                            font-size:17px;
                                            font-weight:750;
                                            color:#111827;
                                        ">
                                            Foto Mobil
                                        </h3>

                                        <p style="
                                            margin:5px 0 0;
                                            color:#6b7280;
                                            font-size:12px;
                                        ">
                                            Foto yang sudah ada tetap tersimpan.
                                        </p>
                                    </div>

                                    <div style="
                                        background:#f3f4f6;
                                        color:#374151;
                                        border-radius:999px;
                                        padding:5px 9px;
                                        font-size:11px;
                                        font-weight:700;
                                    ">
                                        {{ $car->images->count() }} Foto
                                    </div>
                                </div>
                            </div>


                            <div style="padding:20px;">

                                {{-- FOTO LAMA --}}
                                @if ($car->images->count())

                                    <div style="
                                        display:grid;
                                        grid-template-columns:repeat(2, minmax(0, 1fr));
                                        gap:10px;
                                    ">

                                        @foreach ($car->images as $image)

                                            <div style="
                                                position:relative;
                                                border-radius:10px;
                                                overflow:hidden;
                                                background:#f3f4f6;
                                                border:1px solid #e5e7eb;
                                            ">

                                                <img
                                                    src="{{ asset('storage/' . $image->image) }}"
                                                    alt="{{ $car->name }}"
                                                    style="
                                                        width:100%;
                                                        height:150px;
                                                        object-fit:cover;
                                                        display:block;
                                                    "
                                                >

                                                @if ($image->is_primary)
                                                    <div style="
                                                        position:absolute;
                                                        left:8px;
                                                        bottom:8px;
                                                        background:#111;
                                                        color:#fff;
                                                        padding:5px 8px;
                                                        border-radius:5px;
                                                        font-size:10px;
                                                        font-weight:700;
                                                    ">
                                                        FOTO UTAMA
                                                    </div>
                                                @endif

                                            </div>

                                        @endforeach

                                    </div>

                                @else

                                    <div style="
                                        border:1px dashed #d1d5db;
                                        border-radius:10px;
                                        padding:30px 15px;
                                        text-align:center;
                                        color:#6b7280;
                                        font-size:13px;
                                    ">
                                        Belum ada foto mobil.
                                    </div>

                                @endif


                                {{-- UPLOAD BARU --}}
                                <div style="
                                    margin-top:20px;
                                    padding-top:20px;
                                    border-top:1px solid #e5e7eb;
                                ">

                                    <label class="edit-label">
                                        Tambah Foto Baru
                                    </label>

                                    <label style="
                                        display:block;
                                        border:1px dashed #bfc3c9;
                                        border-radius:10px;
                                        padding:18px;
                                        text-align:center;
                                        cursor:pointer;
                                        background:#fafafa;
                                    ">

                                        <div style="
                                            font-size:22px;
                                            margin-bottom:6px;
                                        ">
                                            +
                                        </div>

                                        <div style="
                                            font-size:13px;
                                            font-weight:700;
                                            color:#374151;
                                        ">
                                            Pilih Foto
                                        </div>

                                        <div style="
                                            font-size:11px;
                                            color:#9ca3af;
                                            margin-top:4px;
                                        ">
                                            JPG, JPEG, PNG, WEBP — maksimal 5 MB
                                        </div>

                                        <input
                                            type="file"
                                            name="images[]"
                                            multiple
                                            accept="image/jpeg,image/png,image/webp"
                                            style="display:none;"
                                        >

                                    </label>

                                    <p style="
                                        margin:8px 0 0;
                                        font-size:11px;
                                        color:#9ca3af;
                                        line-height:1.5;
                                    ">
                                        Kosongkan bagian ini jika tidak ingin menambahkan foto.
                                        Foto lama tidak akan terhapus.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- ACTION CARD --}}
                        <div style="
                            background:#fff;
                            border:1px solid #e5e7eb;
                            border-radius:14px;
                            padding:18px;
                            margin-top:16px;
                        ">

                            <div style="
                                display:flex;
                                gap:10px;
                            ">

                                <a
                                    href="{{ route('admin.cars.index') }}"
                                    style="
                                        flex:1;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        padding:11px 14px;
                                        border:1px solid #d1d5db;
                                        border-radius:8px;
                                        background:#fff;
                                        color:#374151;
                                        text-decoration:none;
                                        font-size:13px;
                                        font-weight:700;
                                    "
                                >
                                    Batal
                                </a>

                                <button
                                    type="submit"
                                    style="
                                        flex:1;
                                        border:none;
                                        border-radius:8px;
                                        background:#111;
                                        color:#fff;
                                        padding:11px 14px;
                                        font-size:13px;
                                        font-weight:700;
                                        cursor:pointer;
                                    "
                                >
                                    Simpan Perubahan
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- PAGE STYLE --}}
    <style>
        .edit-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 18px;
        }

        .edit-label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: 700;
            color: #374151;
        }

        .edit-input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #fff;
            color: #111827;
            font-size: 13px;
            outline: none;
        }

        .edit-input:focus {
            border-color: #111827;
            box-shadow: 0 0 0 2px rgba(17, 24, 39, 0.08);
        }

        @media (max-width: 900px) {
            .edit-grid-2 {
                grid-template-columns: 1fr;
            }

            form > div {
                grid-template-columns: 1fr !important;
            }
        }

        @media (max-width: 640px) {
            .edit-grid-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>

</x-app-layout>