<x-app-layout>

    <style>
        /* =========================================================
           YUNHA AUTO - CAR DETAIL
        ========================================================= */

        .detail-page {
            min-height: calc(100vh - 64px);
            background: #f6f6f6;
            color: #111;
        }

        .detail-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 24px;
            padding-right: 24px;
        }

        /* =========================================================
           HEADER
        ========================================================= */

        .detail-header {
            padding: 22px 24px;
            background: #fff;
            border-bottom: 1px solid #e5e5e5;
        }

        .detail-header-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .detail-header-brand {
            margin: 0;
            color: #777;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .detail-header-title {
            margin: 4px 0 0;
            color: #111;
            font-size: 22px;
            font-weight: 700;
        }

        /* =========================================================
           BACK
        ========================================================= */

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 28px;
            color: #777;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            transition: .2s ease;
        }

        .back-link:hover {
            color: #111;
        }

        /* =========================================================
           MAIN PRODUCT SECTION
        ========================================================= */

        .product-section {
            padding-top: 28px;
            padding-bottom: 65px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: 1.12fr .88fr;
            gap: 45px;
            align-items: start;
        }

        /* =========================================================
           GALLERY
        ========================================================= */

        .gallery-main {
            position: relative;
            overflow: hidden;
            height: 520px;
            background: #e9e9e9;
            border-radius: 12px;
        }

        .gallery-main img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            transition: opacity .18s ease, transform .5s ease;
        }

        .gallery-main:hover img {
            transform: scale(1.02);
        }

        .gallery-empty {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 14px;
        }

        .gallery-badges {
            position: absolute;
            top: 18px;
            left: 18px;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .gallery-badge {
            padding: 8px 11px;
            background: #111;
            color: #fff;
            border-radius: 5px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .gallery-badge.light {
            background: rgba(255,255,255,.92);
            color: #222;
        }

        .gallery-thumbnails {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
            margin-top: 9px;
        }

        .gallery-thumb {
            height: 82px;
            padding: 0;
            overflow: hidden;
            background: #fff;
            border: 2px solid transparent;
            border-radius: 7px;
            cursor: pointer;
            transition: .2s ease;
        }

        .gallery-thumb:hover {
            border-color: #999;
        }

        .gallery-thumb.active {
            border-color: #111;
        }

        .gallery-thumb img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .gallery-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: 12px;
        }

        .gallery-meta p {
            margin: 0;
            color: #999;
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* =========================================================
           PRODUCT INFO
        ========================================================= */

        .product-info {
            padding-top: 5px;
        }

        .product-brand {
            margin: 0;
            color: #777;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .product-name {
            margin: 10px 0 0;
            color: #111;
            font-size: 48px;
            line-height: 1.02;
            font-weight: 800;
            letter-spacing: -1.8px;
        }

        .price-box {
            margin-top: 30px;
            padding-bottom: 25px;
            border-bottom: 1px solid #ddd;
        }

        .price-label {
            margin: 0;
            color: #999;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .price {
            margin: 7px 0 0;
            color: #111;
            font-size: 31px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        /* =========================================================
           QUICK SPECS
        ========================================================= */

        .quick-specs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            padding: 25px 0;
            border-bottom: 1px solid #ddd;
        }

        .quick-spec {
            padding: 0 15px;
            border-right: 1px solid #e1e1e1;
        }

        .quick-spec:first-child {
            padding-left: 0;
        }

        .quick-spec:last-child {
            padding-right: 0;
            border-right: 0;
        }

        .quick-spec-label {
            margin: 0;
            color: #999;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .quick-spec-value {
            margin: 7px 0 0;
            color: #111;
            font-size: 13px;
            font-weight: 700;
        }

        /* =========================================================
           ACTIONS
        ========================================================= */

        .actions {
            display: flex;
            flex-direction: column;
            gap: 9px;
            padding-top: 25px;
        }

        .action-button {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            min-height: 52px;
            padding: 0 18px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-decoration: none;
            text-transform: uppercase;
            transition: .2s ease;
        }

        .action-button.primary {
            background: #111;
            color: #fff;
            border: 1px solid #111;
        }

        .action-button.primary:hover {
            background: #333;
            border-color: #333;
        }

        .action-button.secondary {
            background: #fff;
            color: #111;
            border: 1px solid #d8d8d8;
        }

        .action-button.secondary:hover {
            border-color: #111;
        }

        .action-button.subtle {
            background: transparent;
            color: #666;
            border: 1px solid #ddd;
        }

        .action-button.subtle:hover {
            color: #111;
            border-color: #111;
            background: #fff;
        }

        .action-arrow {
            font-size: 17px;
            transition: transform .2s ease;
        }

        .action-button:hover .action-arrow {
            transform: translateX(3px);
        }

        .availability-note {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .availability-icon {
            width: 29px;
            height: 29px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #111;
            color: #fff;
            border-radius: 50%;
            font-size: 11px;
            font-weight: 700;
        }

        .availability-title {
            margin: 0;
            color: #222;
            font-size: 12px;
            font-weight: 700;
        }

        .availability-text {
            margin: 4px 0 0;
            color: #777;
            font-size: 11px;
            line-height: 1.7;
        }

        /* =========================================================
           INFORMATION SECTION
        ========================================================= */

        .information-grid {
            display: grid;
            grid-template-columns: 1.25fr .75fr;
            gap: 22px;
            margin-top: 55px;
        }

        .info-card {
            padding: 34px;
            background: #fff;
            border: 1px solid #e1e1e1;
            border-radius: 10px;
        }

        .info-card.dark {
            background: #111;
            border-color: #111;
            color: #fff;
        }

        .section-eyebrow {
            margin: 0;
            color: #999;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .dark .section-eyebrow {
            color: #666;
        }

        .section-title {
            margin: 7px 0 0;
            color: #111;
            font-size: 25px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -.6px;
        }

        .dark .section-title {
            color: #fff;
        }

        .description {
            margin: 20px 0 0;
            color: #666;
            font-size: 13px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .dark .description {
            color: #aaa;
        }

        .spec-list {
            margin-top: 22px;
        }

        .spec-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 13px 0;
            border-bottom: 1px solid #eee;
        }

        .dark .spec-row {
            border-bottom-color: rgba(255,255,255,.1);
        }

        .spec-row:last-child {
            border-bottom: 0;
        }

        .spec-row-label {
            color: #999;
            font-size: 11px;
        }

        .spec-row-value {
            color: #222;
            font-size: 11px;
            font-weight: 700;
            text-align: right;
        }

        .dark .spec-row-value {
            color: #fff;
        }

        /* =========================================================
           CREDIT SIMULATOR
        ========================================================= */

        .credit-section {
            margin-top: 22px;
            padding: 40px;
            background: #111;
            color: #fff;
            border-radius: 10px;
        }

        .credit-grid {
            display: grid;
            grid-template-columns: .8fr 1.2fr;
            gap: 55px;
        }

        .credit-title {
            margin: 8px 0 0;
            color: #fff;
            font-size: 33px;
            line-height: 1.1;
            font-weight: 750;
            letter-spacing: -.8px;
        }

        .credit-description {
            max-width: 470px;
            margin: 18px 0 0;
            color: #aaa;
            font-size: 13px;
            line-height: 1.8;
        }

        .credit-price {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,.1);
        }

        .credit-price-label {
            margin: 0;
            color: #666;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .credit-price-value {
            margin: 7px 0 0;
            color: #fff;
            font-size: 23px;
            font-weight: 750;
        }

        .credit-controls {
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .credit-control label {
            display: block;
            margin-bottom: 10px;
            color: #999;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .credit-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .credit-label-row label {
            margin-bottom: 0;
        }

        .credit-percentage {
            color: #fff;
            font-size: 13px;
            font-weight: 700;
        }

        .credit-range {
            width: 100%;
            margin-top: 13px;
            accent-color: #fff;
            cursor: pointer;
        }

        .range-labels {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 9px;
        }

        .range-labels span {
            color: #555;
            font-size: 9px;
        }

        .dp-value {
            color: #ccc !important;
            font-size: 12px !important;
        }

        .credit-select,
        .credit-input {
            width: 100%;
            height: 45px;
            padding: 0 13px;
            background: rgba(255,255,255,.05);
            color: #fff;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 6px;
            font-family: inherit;
            font-size: 12px;
            outline: none;
            transition: .2s ease;
        }

        .credit-select:focus,
        .credit-input:focus {
            border-color: #fff;
        }

        .credit-select option {
            color: #111;
        }

        .credit-input-wrapper {
            position: relative;
        }

        .credit-input {
            padding-right: 40px;
        }

        .credit-percent {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            color: #666;
            font-size: 12px;
        }

        .credit-result {
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,.1);
        }

        .credit-result-label {
            margin: 0;
            color: #666;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .monthly-payment {
            margin: 8px 0 0;
            color: #fff;
            font-size: 35px;
            line-height: 1.15;
            font-weight: 750;
            letter-spacing: -.8px;
        }

        .credit-summary {
            margin: 8px 0 0;
            color: #666;
            font-size: 10px;
        }

        .credit-disclaimer {
            margin: 32px 0 0;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,.1);
            color: #555;
            font-size: 10px;
            line-height: 1.7;
        }

        /* =========================================================
           FINAL CTA
        ========================================================= */

        .final-cta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            margin-top: 22px;
            padding: 35px;
            background: #fff;
            border: 1px solid #e1e1e1;
            border-radius: 10px;
        }

        .final-cta-title {
            margin: 7px 0 0;
            color: #111;
            font-size: 25px;
            line-height: 1.2;
            font-weight: 750;
            letter-spacing: -.5px;
        }

        .final-cta-text {
            margin: 9px 0 0;
            color: #777;
            font-size: 13px;
        }

        .final-cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            min-height: 48px;
            padding: 0 22px;
            background: #111;
            color: #fff;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-decoration: none;
            text-transform: uppercase;
            transition: .2s ease;
        }

        .final-cta-button:hover {
            background: #333;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1000px) {
            .product-grid {
                grid-template-columns: 1fr;
            }

            .gallery-main {
                height: 480px;
            }

            .product-name {
                font-size: 42px;
            }

            .information-grid {
                grid-template-columns: 1fr;
            }

            .credit-grid {
                grid-template-columns: 1fr;
                gap: 35px;
            }
        }

        @media (max-width: 700px) {
            .detail-container {
                padding-left: 16px;
                padding-right: 16px;
            }

            .detail-header {
                padding: 18px 16px;
            }

            .detail-header-title {
                font-size: 20px;
            }

            .product-section {
                padding-bottom: 45px;
            }

            .gallery-main {
                height: 330px;
            }

            .gallery-thumbnails {
                grid-template-columns: repeat(4, 1fr);
            }

            .gallery-thumb {
                height: 65px;
            }

            .gallery-thumb:nth-child(n+5) {
                display: none;
            }

            .product-name {
                font-size: 35px;
            }

            .price {
                font-size: 27px;
            }

            .quick-specs {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px 0;
            }

            .quick-spec:nth-child(3) {
                padding-left: 0;
                border-right: 0;
            }

            .quick-spec:nth-child(2) {
                border-right: 0;
            }

            .quick-spec:nth-child(4),
            .quick-spec:nth-child(5),
            .quick-spec:nth-child(6) {
                padding-left: 0;
            }

            .info-card,
            .credit-section,
            .final-cta {
                padding: 25px 20px;
            }

            .credit-title {
                font-size: 29px;
            }

            .monthly-payment {
                font-size: 29px;
            }

            .final-cta {
                align-items: stretch;
                flex-direction: column;
            }

            .final-cta-button {
                width: 100%;
            }
        }
    </style>



    @php
        $primaryImage = $car->images->firstWhere('is_primary', true)
            ?? $car->images->first();

        $galleryImages = $car->images;

        $specs = [
            [
                'label' => 'Tahun',
                'value' => $car->year ?: '-'
            ],
            [
                'label' => 'Mileage',
                'value' => $car->mileage !== null
                    ? number_format($car->mileage, 0, ',', '.') . ' km'
                    : '-'
            ],
            [
                'label' => 'Transmisi',
                'value' => $car->transmission ?: '-'
            ],
            [
                'label' => 'Bahan Bakar',
                'value' => $car->fuel ?: '-'
            ],
            [
                'label' => 'Warna',
                'value' => $car->color ?: '-'
            ],
            [
                'label' => 'Kondisi',
                'value' => $car->condition ?: '-'
            ],
        ];
    @endphp

    <main class="detail-page">

        <div class="detail-container">

            {{-- BACK TO CATALOG --}}
            <a
                href="{{ route('cars.index') }}"
                class="back-link"
            >
                ← Kembali ke katalog
            </a>

            {{-- =====================================================
                 PRODUCT
            ====================================================== --}}

            <section class="product-section">

                <div class="product-grid">

                    {{-- GALLERY --}}
                    <div>

                        <div class="gallery-main">

                            @if ($primaryImage)

                                <img
                                    id="mainCarImage"
                                    src="{{ asset('storage/' . $primaryImage->image) }}"
                                    alt="{{ $car->name }}"
                                >

                            @else

                                <div class="gallery-empty">
                                    Tidak ada gambar kendaraan
                                </div>

                            @endif

                            <div class="gallery-badges">

                                <span class="gallery-badge">
                                    {{ strtoupper($car->status ?: 'Available') }}
                                </span>

                                @if ($car->condition)

                                    <span class="gallery-badge light">
                                        {{ strtoupper($car->condition) }}
                                    </span>

                                @endif

                            </div>

                        </div>

                        @if ($galleryImages->count())

                            <div class="gallery-thumbnails">

                                @foreach ($galleryImages as $index => $image)

                                    <button
                                        type="button"
                                        class="gallery-thumb {{ $index === 0 ? 'active' : '' }}"
                                        onclick="changeMainImage(
                                            '{{ asset('storage/' . $image->image) }}',
                                            this
                                        )"
                                    >
                                        <img
                                            src="{{ asset('storage/' . $image->image) }}"
                                            alt="{{ $car->name }}"
                                        >
                                    </button>

                                @endforeach

                            </div>

                        @endif

                        <div class="gallery-meta">

                            <p>
                                {{ $galleryImages->count() }} Foto kendaraan
                            </p>


                        </div>

                    </div>


                    {{-- PRODUCT INFORMATION --}}
                    <div class="product-info">

                        <p class="product-brand">
                            {{ $car->brand->name ?? 'Tanpa Brand' }}
                        </p>

                        <h1 class="product-name">
                            {{ $car->name }}
                        </h1>

                        <div class="price-box">

                            <p class="price-label">
                                Harga
                            </p>

                            <p class="price">
                                Rp {{ number_format($car->price, 0, ',', '.') }}
                            </p>

                        </div>


                        {{-- QUICK SPECS --}}
                        <div class="quick-specs">

                            <div class="quick-spec">

                                <p class="quick-spec-label">
                                    Tahun
                                </p>

                                <p class="quick-spec-value">
                                    {{ $car->year ?: '-' }}
                                </p>

                            </div>

                            <div class="quick-spec">

                                <p class="quick-spec-label">
                                    Transmisi
                                </p>

                                <p class="quick-spec-value">
                                    {{ $car->transmission ?: '-' }}
                                </p>

                            </div>

                            <div class="quick-spec">

                                <p class="quick-spec-label">
                                    Mileage
                                </p>

                                <p class="quick-spec-value">
                                    {{ $car->mileage !== null
                                        ? number_format($car->mileage, 0, ',', '.') . ' km'
                                        : '-'
                                    }}
                                </p>

                            </div>

                            <div class="quick-spec">

                                <p class="quick-spec-label">
                                    Bahan Bakar
                                </p>

                                <p class="quick-spec-value">
                                    {{ $car->fuel ?: '-' }}
                                </p>

                            </div>

                            <div class="quick-spec">

                                <p class="quick-spec-label">
                                    Warna
                                </p>

                                <p class="quick-spec-value">
                                    {{ $car->color ?: '-' }}
                                </p>

                            </div>

                            <div class="quick-spec">

                                <p class="quick-spec-label">
                                    Kondisi
                                </p>

                                <p class="quick-spec-value">
                                    {{ $car->condition ?: '-' }}
                                </p>

                            </div>

                        </div>


                        {{-- ACTIONS --}}
                        <div class="actions">

                            <a
                                href="{{ route('test-drive.create', $car->id) }}"
                                class="action-button primary"
                            >
                                <span>Jadwalkan Test Drive</span>
                                <span class="action-arrow">→</span>
                            </a>


                            <form
                                action="{{ route('wishlist.toggle', $car->id) }}"
                                method="POST"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    class="action-button secondary"
                                >
                                    <span>♡ Tambahkan ke Wishlist</span>
                                    <span class="action-arrow">♡</span>
                                </button>

                            </form>


                            <a
                                href="{{ route('reservation.create', $car) }}"
                                class="action-button primary"
                            >
                                <span>Reservasi Mobil</span>
                                <span class="action-arrow">→</span>
                            </a>


                            <a
                                href="{{ route('compare.index', ['cars[]' => $car->id]) }}"
                                class="action-button subtle"
                            >
                                <span>Bandingkan Mobil</span>
                                <span class="action-arrow">↗</span>
                            </a>


                            <a
                                href="#simulasi-kredit"
                                class="action-button subtle"
                            >
                                <span>Simulasi Kredit</span>
                                <span class="action-arrow">↓</span>
                            </a>

                        </div>


                        {{-- AVAILABILITY --}}
                        <div class="availability-note">

                            <div class="availability-icon">
                                ✓
                            </div>

                            <div>

                                <p class="availability-title">
                                    Kendaraan tersedia di Yunha Auto
                                </p>

                                <p class="availability-text">
                                    Hubungi kami untuk informasi kendaraan,
                                    pengecekan unit, dan proses pembelian.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     DESCRIPTION + SPECIFICATION
                ================================================== --}}

                <div class="information-grid">

                    {{-- DESCRIPTION --}}
                    <section class="info-card">

                        <p class="section-eyebrow">
                            About the vehicle
                        </p>

                        <h2 class="section-title">
                            Tentang Mobil Ini
                        </h2>

                        <p class="description">
                            {{ $car->description ?: 'Tidak ada deskripsi untuk mobil ini.' }}
                        </p>

                    </section>


                    {{-- SPECIFICATION --}}
                    <section class="info-card dark">

                        <p class="section-eyebrow">
                            Vehicle details
                        </p>

                        <h2 class="section-title">
                            Spesifikasi
                        </h2>

                        <div class="spec-list">

                            @foreach ($specs as $spec)

                                <div class="spec-row">

                                    <span class="spec-row-label">
                                        {{ $spec['label'] }}
                                    </span>

                                    <span class="spec-row-value">
                                        {{ $spec['value'] }}
                                    </span>

                                </div>

                            @endforeach

                        </div>

                    </section>

                </div>


                {{-- =================================================
                     CREDIT SIMULATOR
                ================================================== --}}

                <section
                    id="simulasi-kredit"
                    class="credit-section"
                >

                    <div class="credit-grid">

                        <div>

                            <p class="section-eyebrow">
                                Financial planning
                            </p>

                            <h2 class="credit-title">
                                Simulasi Kredit
                            </h2>

                            <p class="credit-description">
                                Hitung estimasi cicilan kendaraan
                                berdasarkan uang muka, tenor,
                                dan bunga yang Anda tentukan.
                            </p>

                            <div class="credit-price">

                                <p class="credit-price-label">
                                    Harga kendaraan
                                </p>

                                <p class="credit-price-value">
                                    Rp {{ number_format($car->price, 0, ',', '.') }}
                                </p>

                            </div>

                        </div>


                        <div class="credit-controls">

                            {{-- DP --}}
                            <div class="credit-control">

                                <div class="credit-label-row">

                                    <label for="creditDp">
                                        Uang Muka
                                    </label>

                                    <span
                                        id="dpPercentage"
                                        class="credit-percentage"
                                    >
                                        20%
                                    </span>

                                </div>

                                <input
                                    type="range"
                                    id="creditDp"
                                    min="10"
                                    max="80"
                                    step="5"
                                    value="20"
                                    class="credit-range"
                                >

                                <div class="range-labels">

                                    <span>10%</span>

                                    <span
                                        id="dpValue"
                                        class="dp-value"
                                    >
                                        Rp 0
                                    </span>

                                    <span>80%</span>

                                </div>

                            </div>


                            {{-- TENOR --}}
                            <div class="credit-control">

                                <label for="creditTenor">
                                    Tenor
                                </label>

                                <select
                                    id="creditTenor"
                                    class="credit-select"
                                >

                                    @for ($i = 1; $i <= 7; $i++)

                                        <option
                                            value="{{ $i }}"
                                            {{ $i == 5 ? 'selected' : '' }}
                                        >
                                            {{ $i }} Tahun
                                        </option>

                                    @endfor

                                </select>

                            </div>


                            {{-- INTEREST --}}
                            <div class="credit-control">

                                <label for="creditInterest">
                                    Bunga per Tahun
                                </label>

                                <div class="credit-input-wrapper">

                                    <input
                                        type="number"
                                        id="creditInterest"
                                        value="6"
                                        min="0"
                                        max="30"
                                        step="0.1"
                                        class="credit-input"
                                    >

                                    <span class="credit-percent">
                                        %
                                    </span>

                                </div>

                            </div>


                            {{-- RESULT --}}
                            <div class="credit-result">

                                <p class="credit-result-label">
                                    Estimasi cicilan per bulan
                                </p>

                                <p
                                    id="monthlyPayment"
                                    class="monthly-payment"
                                >
                                    Rp 0
                                </p>

                                <p
                                    id="creditSummary"
                                    class="credit-summary"
                                >
                                    DP 20% · Tenor 5 tahun · Bunga 6% per tahun
                                </p>

                            </div>

                        </div>

                    </div>

                    <p class="credit-disclaimer">
                        * Simulasi ini merupakan estimasi untuk membantu
                        perencanaan pembelian. Nilai cicilan sebenarnya
                        dapat berbeda berdasarkan kebijakan bank/leasing,
                        biaya administrasi, asuransi, dan ketentuan
                        pembiayaan yang berlaku.
                    </p>

                </section>


                {{-- =================================================
                     FINAL CTA
                ================================================== --}}

                <section class="final-cta">

                    <div>

                        <p class="section-eyebrow">
                            Interested in this vehicle?
                        </p>

                        <h2 class="final-cta-title">
                            Ingin melihat unit secara langsung?
                        </h2>

                        <p class="final-cta-text">
                            Jadwalkan test drive dan rasakan kendaraan pilihan Anda.
                        </p>

                    </div>

                    <a
                        href="{{ route('test-drive.create', $car->id) }}"
                        class="final-cta-button"
                    >
                        Jadwalkan Test Drive →
                    </a>

                </section>

            </section>

        </div>

    </main>


    {{-- =============================================================
         JAVASCRIPT
    ============================================================== --}}

    <script>

        /* =========================================================
           GALLERY
        ========================================================= */

        function changeMainImage(src, button) {

            const image =
                document.getElementById('mainCarImage');

            if (image) {

                image.style.opacity = '0';

                setTimeout(function () {

                    image.src = src;
                    image.style.opacity = '1';

                }, 150);

            }

            document
                .querySelectorAll('.gallery-thumb')
                .forEach(function (thumbnail) {

                    thumbnail.classList.remove('active');

                });

            if (button) {

                button.classList.add('active');

            }

        }


        /* =========================================================
           CREDIT CALCULATOR
        ========================================================= */

        const carPrice =
            {{ (float) $car->price }};

        const dp =
            document.getElementById('creditDp');

        const tenor =
            document.getElementById('creditTenor');

        const interest =
            document.getElementById('creditInterest');

        const dpPercentage =
            document.getElementById('dpPercentage');

        const dpValue =
            document.getElementById('dpValue');

        const monthlyPayment =
            document.getElementById('monthlyPayment');

        const creditSummary =
            document.getElementById('creditSummary');


        function formatRupiah(value) {

            return new Intl.NumberFormat('id-ID')
                .format(Math.round(value));

        }


        function calculateCredit() {

            if (
                !dp ||
                !tenor ||
                !interest ||
                !dpPercentage ||
                !dpValue ||
                !monthlyPayment ||
                !creditSummary
            ) {
                return;
            }


            const dpPercent =
                Number(dp.value);

            const years =
                Number(tenor.value);

            const annualRate =
                Number(interest.value);


            const downPayment =
                carPrice * (dpPercent / 100);

            const principal =
                carPrice - downPayment;

            const months =
                years * 12;

            const monthlyRate =
                annualRate / 100 / 12;


            let payment = 0;


            if (principal > 0 && months > 0) {

                if (monthlyRate === 0) {

                    payment =
                        principal / months;

                } else {

                    payment =
                        principal *
                        (
                            monthlyRate *
                            Math.pow(
                                1 + monthlyRate,
                                months
                            )
                        ) /
                        (
                            Math.pow(
                                1 + monthlyRate,
                                months
                            ) - 1
                        );

                }

            }


            dpPercentage.textContent =
                dpPercent + '%';

            dpValue.textContent =
                'Rp ' + formatRupiah(downPayment);

            monthlyPayment.textContent =
                'Rp ' + formatRupiah(payment);

            creditSummary.textContent =
                `DP ${dpPercent}% · Tenor ${years} tahun · Bunga ${annualRate}% per tahun`;

        }


        if (dp) {

            dp.addEventListener(
                'input',
                calculateCredit
            );

        }

        if (tenor) {

            tenor.addEventListener(
                'change',
                calculateCredit
            );

        }

        if (interest) {

            interest.addEventListener(
                'input',
                calculateCredit
            );

        }


        calculateCredit();

    </script>

</x-app-layout>