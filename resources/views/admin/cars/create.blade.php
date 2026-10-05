<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Mobil
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto px-6 py-8">

            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6">
                <h1 class="text-2xl font-bold">
                    Tambah Mobil
                </h1>

                <p class="text-gray-600">
                    Tambahkan data mobil baru ke Yunha Auto
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">

                <form
                    action="{{ route('admin.cars.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf

                    {{-- NAMA MOBIL --}}
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Nama Mobil
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full border rounded-lg px-4 py-2"
                            placeholder="Contoh: Toyota Avanza"
                            required
                        >

                    </div>


{{-- BRAND --}}
<div class="mb-4">

    <label class="block font-semibold mb-2">
        Brand
    </label>

    <select
        name="brand_id"
        id="brand_id"
        class="w-full border rounded-lg px-4 py-2"
    >
        <option value="">
            -- Pilih Brand --
        </option>

        @foreach ($brands as $brand)

            <option
                value="{{ $brand->id }}"
                {{ old('brand_id') == $brand->id ? 'selected' : '' }}
            >
                {{ $brand->name }}
            </option>

        @endforeach

        <option value="new">
            + Tambah Brand Baru
        </option>

    </select>

</div>


{{-- BRAND BARU --}}
<div
    id="new-brand-wrapper"
    class="mb-4"
    style="display:none;"
>

    <label class="block font-semibold mb-2">
        Nama Brand Baru
    </label>

    <input
        type="text"
        name="new_brand"
        id="new_brand"
        value="{{ old('new_brand') }}"
        class="w-full border rounded-lg px-4 py-2"
        placeholder="Contoh: Porsche"
    >

    <p class="text-sm text-gray-500 mt-2">
        Isi jika ingin membuat brand baru.
    </p>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const brandSelect = document.getElementById('brand_id');
        const newBrandWrapper = document.getElementById('new-brand-wrapper');
        const newBrandInput = document.getElementById('new_brand');

        function toggleNewBrand() {

            if (brandSelect.value === 'new') {

                newBrandWrapper.style.display = 'block';

                newBrandInput.required = true;

            } else {

                newBrandWrapper.style.display = 'none';

                newBrandInput.required = false;
                newBrandInput.value = '';

            }

        }

        brandSelect.addEventListener('change', toggleNewBrand);

        toggleNewBrand();

    });
</script>


                    {{-- TAHUN & HARGA --}}
                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <label class="block font-semibold mb-2">
                                Tahun
                            </label>

                            <input
                                type="number"
                                name="year"
                                value="{{ old('year') }}"
                                class="w-full border rounded-lg px-4 py-2"
                                placeholder="2025"
                                required
                            >

                        </div>


                        <div>

                            <label class="block font-semibold mb-2">
                                Harga
                            </label>

                            <input
                                type="number"
                                name="price"
                                value="{{ old('price') }}"
                                class="w-full border rounded-lg px-4 py-2"
                                placeholder="250000000"
                                required
                            >

                        </div>

                    </div>


                    {{-- KILOMETER --}}
                    <div class="mt-4 mb-4">

                        <label class="block font-semibold mb-2">
                            Kilometer
                        </label>

                        <input
                            type="number"
                            name="mileage"
                            value="{{ old('mileage') }}"
                            class="w-full border rounded-lg px-4 py-2"
                            placeholder="50000"
                            min="0"
                            required
                        >

                    </div>


                    {{-- TRANSMISI & BAHAN BAKAR --}}
                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <label class="block font-semibold mb-2">
                                Transmisi
                            </label>

                            <select
                                name="transmission"
                                class="w-full border rounded-lg px-4 py-2"
                                required
                            >

                                <option value="">
                                    -- Pilih --
                                </option>

                                <option value="Manual">
                                    Manual
                                </option>

                                <option value="Automatic">
                                    Automatic
                                </option>

                            </select>

                        </div>


                        <div>

                            <label class="block font-semibold mb-2">
                                Bahan Bakar
                            </label>

                            <select
                                name="fuel"
                                class="w-full border rounded-lg px-4 py-2"
                                required
                            >

                                <option value="">
                                    -- Pilih --
                                </option>

                                <option value="Bensin">
                                    Bensin
                                </option>

                                <option value="Diesel">
                                    Diesel
                                </option>

                                <option value="Hybrid">
                                    Hybrid
                                </option>

                                <option value="Electric">
                                    Electric
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- WARNA & KONDISI --}}
                    <div class="grid grid-cols-2 gap-4 mt-4">

                        <div>

                            <label class="block font-semibold mb-2">
                                Warna
                            </label>

                            <input
                                type="text"
                                name="color"
                                value="{{ old('color') }}"
                                class="w-full border rounded-lg px-4 py-2"
                                placeholder="Hitam"
                                required
                            >

                        </div>


                        <div>

                            <label class="block font-semibold mb-2">
                                Kondisi
                            </label>

                            <select
                                name="condition"
                                class="w-full border rounded-lg px-4 py-2"
                                required
                            >

                                <option value="">
                                    -- Pilih --
                                </option>

                                <option value="Baru">
                                    Baru
                                </option>

                                <option value="Bekas">
                                    Bekas
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- FOTO MOBIL --}}
                    <div class="mt-6 mb-4">

                        <label class="block font-semibold mb-2">
                            Foto Mobil
                        </label>

                        <input
                            type="file"
                            name="images[]"
                            multiple
                            accept="image/*"
                            class="w-full border rounded-lg px-4 py-2"
                        >

                        <p class="text-sm text-gray-500 mt-2">
                            Bisa pilih beberapa foto sekaligus.
                            Foto pertama akan menjadi foto utama.
                            Maksimal 5 MB per foto.
                        </p>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="mt-4 mb-4">

                        <label class="block font-semibold mb-2">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="w-full border rounded-lg px-4 py-2"
                            placeholder="Deskripsi mobil..."
                        >{{ old('description') }}</textarea>

                    </div>


                    {{-- BUTTON --}}
                    <div class="flex justify-end gap-3 mt-6">

                    <a href="{{ route('admin.cars.index') }}"
                    style="background:#fff;color:#111;border:1px solid #ccc;padding:10px 16px;border-radius:8px;text-decoration:none;">
                        Batal
                    </a>

                    <button type="submit"
                    style="background:#000;color:#fff;border:none;padding:10px 16px;border-radius:8px;cursor:pointer;">
                        Simpan Mobil
                    </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>