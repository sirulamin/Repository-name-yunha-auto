<x-app-layout>

    <style>
        /* =========================================================
           YUNHA AUTO - CATALOG
        ========================================================= */

        .catalog-page {
            background: #f6f6f6;
            min-height: calc(100vh - 64px);
            color: #111;
        }

        .catalog-container {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 24px;
            padding-right: 24px;
        }

        /* =========================================================
           HEADER
        ========================================================= */

        .catalog-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px 24px;
        }

        .catalog-header-brand {
            margin: 0;
            color: #777;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .catalog-header-title {
            margin: 4px 0 0;
            font-size: 23px;
            font-weight: 700;
            color: #111;
        }

        /* =========================================================
           HERO
        ========================================================= */

        .catalog-hero {
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(255,255,255,.08),
                    transparent 30%
                ),
                linear-gradient(135deg, #090909, #1b1b1b);

            color: #fff;
            padding: 65px 24px;
        }

        .hero-grid {
            max-width: 1200px;
            margin: 0 auto;

            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;

            align-items: center;
        }

        .hero-eyebrow {
            margin: 0 0 14px;

            color: #aaa;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
        }

        .hero-title {
            max-width: 600px;

            margin: 0;

            font-size: 48px;
            line-height: 1.08;
            letter-spacing: -1.8px;
            font-weight: 800;
        }

        .hero-description {
            max-width: 540px;

            margin: 19px 0 0;

            color: #c8c8c8;
            font-size: 15px;
            line-height: 1.75;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;

            margin-top: 25px;
            padding: 12px 19px;

            background: #fff;
            color: #111;

            border-radius: 7px;

            font-size: 13px;
            font-weight: 700;

            transition: .2s ease;
        }

        .hero-button:hover {
            background: #e8e8e8;
            transform: translateY(-1px);
        }

        .hero-image {
            height: 330px;

            overflow: hidden;

            background: #222;
            border-radius: 14px;
        }

        .hero-image img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform .5s ease;
        }

        .hero-image:hover img {
            transform: scale(1.03);
        }

        .hero-empty {
            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #777;
            font-size: 14px;
        }

        /* =========================================================
           CONTENT
        ========================================================= */

        .catalog-content {
            padding-top: 38px;
            padding-bottom: 65px;
        }

        /* =========================================================
           FILTER
        ========================================================= */

        .filter-box {
            margin-bottom: 34px;
            padding: 18px;

            background: #fff;
            border: 1px solid #e1e1e1;
            border-radius: 11px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 10px;
        }

        .filter-input,
        .filter-select {
            width: 100%;
            min-height: 45px;

            padding: 0 13px;

            border: 1px solid #ddd;
            border-radius: 7px;

            background: #fff;
            color: #333;

            font-family: inherit;
            font-size: 13px;

            outline: none;

            transition: border-color .2s ease;
        }

        .filter-input:focus,
        .filter-select:focus {
            border-color: #111;
        }

        .filter-button {
            min-height: 45px;

            padding: 0 21px;

            border: 0;
            border-radius: 7px;

            background: #111;
            color: #fff;

            font-family: inherit;
            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .filter-button:hover {
            background: #333;
        }

        .filter-reset {
            display: inline-block;

            margin-top: 11px;

            color: #777;

            font-size: 12px;
            text-decoration: none;
        }

        .filter-reset:hover {
            color: #111;
        }

        /* =========================================================
           CATALOG TITLE
        ========================================================= */

        .catalog-title-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;

            margin-bottom: 23px;
        }

        .catalog-eyebrow {
            margin: 0;

            color: #777;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .catalog-title {
            margin: 5px 0 0;

            font-size: 28px;
            font-weight: 750;
            letter-spacing: -.8px;
        }

        .catalog-count {
            color: #777;
            font-size: 12px;
        }

        /* =========================================================
           CAR GRID
        ========================================================= */

        .car-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fill, minmax(280px, 1fr));

            gap: 22px;
        }

        .car-card {
            overflow: hidden;

            background: #fff;

            border: 1px solid #e2e2e2;
            border-radius: 12px;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                border-color .2s ease;
        }

        .car-card:hover {
            transform: translateY(-4px);

            border-color: #ccc;

            box-shadow:
                0 12px 30px rgba(0,0,0,.07);
        }

        .car-image-wrapper {
            position: relative;

            height: 215px;

            overflow: hidden;

            background: #eee;
        }

        .car-image {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform .35s ease;
        }

        .car-card:hover .car-image {
            transform: scale(1.04);
        }

        .car-no-image {
            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #999;
            font-size: 13px;
        }

        .car-content {
            padding: 20px;
        }

        .car-brand {
            margin: 0 0 5px;

            color: #777;

            font-size: 11px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .car-name {
            margin: 0;

            color: #111;

            font-size: 20px;
            line-height: 1.25;
            font-weight: 750;
        }

        .car-price {
            margin: 10px 0 0;

            color: #111;

            font-size: 19px;
            font-weight: 800;
        }

        .car-specs {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;

            margin-top: 14px;
        }

        .car-spec {
            padding: 6px 8px;

            background: #f3f3f3;

            border-radius: 5px;

            color: #555;

            font-size: 11px;
        }

        .detail-button {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;

            margin-top: 17px;
            padding: 11px;

            background: #111;
            color: #fff;

            border-radius: 7px;

            font-size: 12px;
            font-weight: 600;

            transition: .2s ease;
        }

        .detail-button:hover {
            background: #333;
        }

        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty-state {
            padding: 70px 20px;

            background: #fff;

            border: 1px solid #e1e1e1;
            border-radius: 12px;

            text-align: center;
        }

        .empty-state h3 {
            margin: 0;

            font-size: 20px;
            font-weight: 700;
        }

        .empty-state p {
            margin: 9px 0 0;

            color: #777;

            font-size: 13px;
        }

        /* =========================================================
           COMPARE
        ========================================================= */

        .compare-section {
            padding: 0 24px 70px;
        }

        .compare-container {
            max-width: 1200px;
            margin: 0 auto;

            padding: 34px;

            background: #0a0a0a;
            color: #fff;
        }

        .compare-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;

            gap: 25px;

            margin-bottom: 28px;
        }

        .compare-eyebrow {
            margin: 0;

            color: #666;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .compare-title {
            margin: 8px 0 0;

            font-size: 27px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .compare-description {
            margin: 7px 0 0;

            color: #999;

            font-size: 13px;
            line-height: 1.6;
        }

        .compare-count {
            flex-shrink: 0;

            color: #777;

            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .compare-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .compare-item {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 15px;

            border: 1px solid #222;

            cursor: pointer;

            transition: .2s ease;
        }

        .compare-item:hover {
            border-color: #444;
            background: #111;
        }

        .compare-item input {
            width: 15px;
            height: 15px;

            flex-shrink: 0;

            accent-color: #fff;

            cursor: pointer;
        }

        .compare-car-name {
            overflow: hidden;

            font-size: 13px;
            font-weight: 600;

            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .compare-car-info {
            margin-top: 4px;

            color: #666;

            font-size: 10px;
        }

        .compare-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-top: 25px;
        }

        .compare-note {
            margin: 0;

            color: #666;

            font-size: 11px;
        }

        .compare-button {
            padding: 11px 20px;

            border: 0;

            background: #fff;
            color: #111;

            font-size: 11px;
            font-weight: 700;
            letter-spacing: .8px;

            cursor: pointer;

            transition: .2s ease;
        }

        .compare-button:hover:not(:disabled) {
            background: #ddd;
        }

        .compare-button:disabled {
            opacity: .3;
            cursor: not-allowed;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .hero-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .hero-title {
                font-size: 40px;
            }

            .filter-grid {
                grid-template-columns: 1fr 1fr;
            }

            .filter-input {
                grid-column: span 2;
            }

            .filter-button {
                width: 100%;
            }

            .compare-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {

            .catalog-container {
                padding-left: 16px;
                padding-right: 16px;
            }

            .catalog-header {
                padding: 18px 16px;
            }

            .catalog-header-title {
                font-size: 20px;
            }

            .catalog-hero {
                padding: 45px 16px;
            }

            .hero-title {
                font-size: 31px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-image {
                height: 230px;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .filter-input {
                grid-column: auto;
            }

            .catalog-title-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .car-grid {
                grid-template-columns: 1fr;
            }

            .compare-section {
                padding: 0 16px 50px;
            }

            .compare-container {
                padding: 25px 18px;
            }

            .compare-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .compare-grid {
                grid-template-columns: 1fr;
            }

            .compare-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .compare-button {
                width: 100%;
            }
        }
    </style>





    <div class="catalog-page">

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="catalog-hero">

            <div class="hero-grid">

                <div>

                    <p class="hero-eyebrow">
                        YUNHA AUTO SHOWROOM
                    </p>

                    <h1 class="hero-title">
                        Temukan Mobil
                        <br>
                        yang Cocok untuk Anda
                    </h1>

                    <p class="hero-description">
                        Pilih dari berbagai kendaraan berkualitas
                        dengan informasi lengkap untuk membantu
                        Anda menemukan mobil yang tepat.
                    </p>

                    <a
                        href="#katalog"
                        class="hero-button"
                    >
                        Lihat Koleksi Mobil →
                    </a>

                </div>


                {{-- HERO IMAGE --}}

                <div class="hero-image">

                    @php
                        $heroCar = $cars->first();

                        $heroImage = $heroCar?->images
                            ->firstWhere('is_primary', true)
                            ?? $heroCar?->images->first();
                    @endphp

                    @if ($heroImage)

                        <img
                            src="{{ asset('storage/' . $heroImage->image) }}"
                            alt="{{ $heroCar->name }}"
                        >

                    @else

                        <div class="hero-empty">
                            Tidak ada gambar mobil
                        </div>

                    @endif

                </div>

            </div>

        </section>


        {{-- =====================================================
             CATALOG CONTENT
        ====================================================== --}}

        <div
            id="katalog"
            class="catalog-container catalog-content"
        >

            {{-- FILTER --}}

            <form
                action="{{ route('cars.index') }}"
                method="GET"
                class="filter-box"
            >

                <div class="filter-grid">

                    {{-- SEARCH --}}

                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Cari nama mobil atau brand..."
                        class="filter-input"
                    >


                    {{-- BRAND --}}

                    <select
                        name="brand"
                        class="filter-select"
                    >

                        <option value="">
                            Semua Brand
                        </option>

                        @foreach ($brands as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ ($brand ?? '') == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->name }}
                            </option>

                        @endforeach

                    </select>


                    {{-- PRICE --}}

                    <select
                        name="price"
                        class="filter-select"
                    >

                        <option value="">
                            Semua Harga
                        </option>

                        <option
                            value="under100"
                            {{ ($price ?? '') == 'under100' ? 'selected' : '' }}
                        >
                            Di bawah Rp100 Juta
                        </option>

                        <option
                            value="100to250"
                            {{ ($price ?? '') == '100to250' ? 'selected' : '' }}
                        >
                            Rp100–250 Juta
                        </option>

                        <option
                            value="250to500"
                            {{ ($price ?? '') == '250to500' ? 'selected' : '' }}
                        >
                            Rp250–500 Juta
                        </option>

                        <option
                            value="over500"
                            {{ ($price ?? '') == 'over500' ? 'selected' : '' }}
                        >
                            Di atas Rp500 Juta
                        </option>

                    </select>


                    {{-- SEARCH BUTTON --}}

                    <button
                        type="submit"
                        class="filter-button"
                    >
                        Cari
                    </button>

                </div>


                {{-- RESET --}}

                @if ($search || $brand || $price)

                    <a
                        href="{{ route('cars.index') }}"
                        class="filter-reset"
                    >
                        ← Reset semua filter
                    </a>

                @endif

            </form>


            {{-- CATALOG TITLE --}}

            <div class="catalog-title-row">

                <div>

                    <p class="catalog-eyebrow">
                        PILIHAN KENDARAAN
                    </p>

                    <h2 class="catalog-title">
                        Mobil Tersedia
                    </h2>

                </div>

                <div class="catalog-count">
                    {{ $cars->count() }} mobil tersedia
                </div>

            </div>


            {{-- =================================================
                 CAR GRID
            ================================================== --}}

            @if ($cars->count())

                <div class="car-grid">

                    @foreach ($cars as $car)

                        @php
                            $primaryImage = $car->images
                                ->firstWhere('is_primary', true)
                                ?? $car->images->first();
                        @endphp


                        <article class="car-card">

                            {{-- IMAGE --}}

                            <div class="car-image-wrapper">

                                @if ($primaryImage)

                                    <img
                                        src="{{ asset('storage/' . $primaryImage->image) }}"
                                        alt="{{ $car->name }}"
                                        class="car-image"
                                    >

                                @else

                                    <div class="car-no-image">
                                        Tidak ada gambar
                                    </div>

                                @endif

                            </div>


                            {{-- CONTENT --}}

                            <div class="car-content">

                                <p class="car-brand">
                                    {{ $car->brand->name ?? 'Tanpa Brand' }}
                                </p>

                                <h3 class="car-name">
                                    {{ $car->name }}
                                </h3>

                                <p class="car-price">
                                    Rp {{ number_format($car->price, 0, ',', '.') }}
                                </p>


                                {{-- SPECS --}}

                                <div class="car-specs">

                                    <span class="car-spec">
                                        {{ $car->year }}
                                    </span>

                                    <span class="car-spec">
                                        {{ $car->transmission }}
                                    </span>

                                    <span class="car-spec">
                                        {{ number_format($car->mileage, 0, ',', '.') }} km
                                    </span>

                                </div>


                                {{-- DETAIL --}}

                                <a
                                    href="{{ route('cars.show', ['car' => $car->id]) }}"
                                    class="detail-button"
                                >
                                    Lihat Detail →
                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                {{-- EMPTY STATE --}}

                <div class="empty-state">

                    <h3>
                        Belum Ada Mobil
                    </h3>

                    <p>
                        Tidak ada kendaraan yang sesuai dengan
                        filter atau pencarian Anda.
                    </p>

                </div>

            @endif

            @if ($cars->hasPages())
                <div style="margin-top:28px;">
                    {{ $cars->links() }}
                </div>
            @endif

        </div>


        {{-- =====================================================
             COMPARE
        ====================================================== --}}

        @if ($cars->count() >= 2)

            <section class="compare-section">

                <div class="compare-container">

                    <div class="compare-header">

                        <div>

                            <h2 class="compare-title">
                                Bandingkan Mobil
                            </h2>

                            <p class="compare-description">
                                Pilih hingga 3 kendaraan untuk
                                membandingkan spesifikasinya.
                            </p>

                        </div>

                        <span
                            id="compare-count"
                            class="compare-count"
                        >
                            0 / 3 dipilih
                        </span>

                    </div>


                    <form
                        action="{{ route('compare.index') }}"
                        method="GET"
                    >

                        <div class="compare-grid">

                            @foreach ($cars as $car)

                                <label class="compare-item">

                                    <input
                                        type="checkbox"
                                        name="cars[]"
                                        value="{{ $car->id }}"
                                        class="compare-checkbox"
                                    >

                                    <div style="min-width:0;">

                                        <div class="compare-car-name">
                                            {{ $car->name }}
                                        </div>

                                        <div class="compare-car-info">

                                            {{ $car->brand->name ?? '' }}

                                            @if ($car->year)
                                                · {{ $car->year }}
                                            @endif

                                        </div>

                                    </div>

                                </label>

                            @endforeach

                        </div>


                        <div class="compare-footer">

                            <p class="compare-note">
                                Pilih minimal 2 dan maksimal 3 mobil.
                            </p>

                            <button
                                type="submit"
                                id="compare-button"
                                class="compare-button"
                                disabled
                            >
                                Bandingkan Mobil →
                            </button>

                        </div>

                    </form>

                </div>

            </section>

        @endif

    </div>


    {{-- =========================================================
         COMPARE SCRIPT
    ========================================================== --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const checkboxes =
                document.querySelectorAll('.compare-checkbox');

            const count =
                document.getElementById('compare-count');

            const button =
                document.getElementById('compare-button');


            function updateCompare() {

                const selected =
                    [...checkboxes].filter(
                        checkbox => checkbox.checked
                    );


                if (count) {
                    count.textContent =
                        selected.length + ' / 3 dipilih';
                }


                if (button) {
                    button.disabled =
                        selected.length < 2;
                }


                checkboxes.forEach(function (checkbox) {

                    if (!checkbox.checked) {

                        checkbox.disabled =
                            selected.length >= 3;

                    } else {

                        checkbox.disabled = false;

                    }

                });

            }


            checkboxes.forEach(function (checkbox) {

                checkbox.addEventListener(
                    'change',
                    updateCompare
                );

            });


            updateCompare();

        });
    </script>

</x-app-layout>