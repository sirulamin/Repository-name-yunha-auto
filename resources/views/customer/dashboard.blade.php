<x-app-layout>

    <style>
        .customer-dashboard {
            background: #f7f7f7;
            min-height: calc(100vh - 64px);
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 55px 24px 70px;
        }

        /* =========================
           HERO
        ========================= */

        .dashboard-hero {
            margin-bottom: 42px;
        }

        .dashboard-eyebrow {
            display: inline-block;
            margin-bottom: 13px;

            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;

            color: #777;
        }

        .dashboard-hero h1 {
            margin: 0;
            font-size: 40px;
            line-height: 1.15;
            font-weight: 700;
            letter-spacing: -1.2px;
            color: #111;
        }

        .dashboard-hero p {
            max-width: 610px;
            margin-top: 14px;

            font-size: 15px;
            line-height: 1.7;
            color: #666;
        }

        /* =========================
           STATS
        ========================= */

        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 55px;
        }

        .stat-card {
            position: relative;

            min-height: 220px;
            padding: 26px;

            background: #fff;
            border: 1px solid #dedede;
            border-radius: 10px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            transition: all .2s ease;
        }

        .stat-card:hover {
            border-color: #111;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,.07);
        }

        .stat-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .stat-label {
            margin-bottom: 10px;

            font-size: 13px;
            font-weight: 500;
            color: #666;
        }

        .stat-number {
            font-size: 42px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: -1.5px;
            color: #111;
        }

        .stat-description {
            margin-top: 9px;

            font-size: 12px;
            color: #999;
        }

        .stat-index {
            width: 36px;
            height: 36px;

            border: 1px solid #dedede;
            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 10px;
            font-weight: 700;
            color: #666;
        }

        .stat-button {
            display: inline-flex;
            align-items: center;

            width: fit-content;

            padding: 10px 15px;

            background: #111;
            color: #fff;

            border-radius: 6px;

            font-size: 12px;
            font-weight: 600;

            transition: all .2s ease;
        }

        .stat-button:hover {
            background: #333;
        }

        /* =========================
           QUICK ACTION
        ========================= */

        .quick-section {
            padding-top: 45px;
            border-top: 1px solid #ddd;
        }

        .quick-eyebrow {
            margin-bottom: 9px;

            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;

            color: #777;
        }

        .quick-title {
            margin: 0 0 26px;

            font-size: 25px;
            font-weight: 700;
            letter-spacing: -.6px;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .quick-card {
            display: block;

            padding: 22px;

            background: #fff;
            border: 1px solid #dedede;
            border-radius: 9px;

            transition: all .2s ease;
        }

        .quick-card:hover {
            background: #111;
            border-color: #111;
            color: #fff;

            transform: translateY(-3px);
        }

        .quick-number {
            margin-bottom: 22px;

            font-size: 10px;
            font-weight: 700;
            color: #999;
            letter-spacing: 1px;
        }

        .quick-card h3 {
            margin: 0 0 8px;

            font-size: 15px;
            font-weight: 700;
        }

        .quick-card p {
            margin: 0;

            font-size: 12px;
            line-height: 1.6;
            color: #777;
        }

        .quick-card:hover .quick-number {
            color: #aaa;
        }

        .quick-card:hover p {
            color: #ccc;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .dashboard-container {
                padding: 45px 20px 60px;
            }

            .dashboard-stats {
                grid-template-columns: 1fr;
            }

            .quick-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-hero h1 {
                font-size: 34px;
            }
        }

        @media (max-width: 600px) {

            .dashboard-container {
                padding: 35px 16px 50px;
            }

            .dashboard-hero h1 {
                font-size: 29px;
            }

            .dashboard-hero p {
                font-size: 14px;
            }

            .quick-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                min-height: 195px;
            }
        }
    </style>


    <div class="customer-dashboard">

        <div class="dashboard-container">

            {{-- =========================
                 HERO
            ========================== --}}

            <section class="dashboard-hero">

                <span class="dashboard-eyebrow">
                    Customer Dashboard
                </span>

                <h1>
                    Selamat Datang di Yunha Auto
                </h1>

                <p>
                    Temukan mobil yang sesuai dengan kebutuhan Anda,
                    simpan kendaraan favorit, jadwalkan test drive,
                    dan kelola reservasi Anda dengan mudah.
                </p>

            </section>


            {{-- =========================
                 STATISTICS
            ========================== --}}

            <section class="dashboard-stats">

                {{-- MOBIL --}}

                <div class="stat-card">

                    <div class="stat-header">

                        <div>

                            <div class="stat-label">
                                Mobil Tersedia
                            </div>

                            <div class="stat-number">
                                {{ $carsCount }}
                            </div>

                            <div class="stat-description">
                                Kendaraan siap Anda pilih
                            </div>

                        </div>

                        <div class="stat-index">
                            01
                        </div>

                    </div>

                    <a
                        href="{{ route('cars.index') }}"
                        class="stat-button"
                    >
                        Lihat Katalog →
                    </a>

                </div>


                {{-- WISHLIST --}}

                <div class="stat-card">

                    <div class="stat-header">

                        <div>

                            <div class="stat-label">
                                Wishlist Saya
                            </div>

                            <div class="stat-number">
                                {{ $wishlistCount }}
                            </div>

                            <div class="stat-description">
                                Kendaraan favorit Anda
                            </div>

                        </div>

                        <div class="stat-index">
                            02
                        </div>

                    </div>

                    <a
                        href="{{ route('wishlist.index') }}"
                        class="stat-button"
                    >
                        Lihat Wishlist →
                    </a>

                </div>


                {{-- TEST DRIVE --}}

                <div class="stat-card">

                    <div class="stat-header">

                        <div>

                            <div class="stat-label">
                                Test Drive
                            </div>

                            <div class="stat-number">
                                {{ $testDriveCount }}
                            </div>

                            <div class="stat-description">
                                Riwayat test drive Anda
                            </div>

                        </div>

                        <div class="stat-index">
                            03
                        </div>

                    </div>

                    <a
                        href="{{ route('test-drive.index') }}"
                        class="stat-button"
                    >
                        Riwayat Test Drive →
                    </a>

                </div>

            </section>


            {{-- =========================
                 QUICK ACTION
            ========================== --}}

            <section class="quick-section">

                <div class="quick-eyebrow">
                    Explore Yunha Auto
                </div>

                <h2 class="quick-title">
                    Apa yang ingin Anda lakukan?
                </h2>

                <div class="quick-grid">

                    <a
                        href="{{ route('cars.index') }}"
                        class="quick-card"
                    >

                        <div class="quick-number">
                            01
                        </div>

                        <h3>
                            Cari Mobil
                        </h3>

                        <p>
                            Jelajahi katalog dan temukan
                            kendaraan yang sesuai untuk Anda.
                        </p>

                    </a>


                    <a
                        href="{{ route('wishlist.index') }}"
                        class="quick-card"
                    >

                        <div class="quick-number">
                            02
                        </div>

                        <h3>
                            Lihat Wishlist
                        </h3>

                        <p>
                            Buka kembali daftar kendaraan
                            yang telah Anda simpan.
                        </p>

                    </a>


                    <a
                        href="{{ route('test-drive.index') }}"
                        class="quick-card"
                    >

                        <div class="quick-number">
                            03
                        </div>

                        <h3>
                            Jadwalkan Test Drive
                        </h3>

                        <p>
                            Lihat dan kelola jadwal
                            test drive kendaraan.
                        </p>

                    </a>


                    <a
                        href="{{ route('reservation.index') }}"
                        class="quick-card"
                    >

                        <div class="quick-number">
                            04
                        </div>

                        <h3>
                            Kelola Reservasi
                        </h3>

                        <p>
                            Periksa status dan detail
                            reservasi kendaraan Anda.
                        </p>

                    </a>

                </div>

            </section>

        </div>

    </div>

</x-app-layout>