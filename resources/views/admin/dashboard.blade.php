<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Yunha Auto</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #111;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 230px;
            background: #111;
            color: white;
            padding: 25px 18px;
            flex-shrink: 0;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 11px;
            color: #888;
            margin-bottom: 10px;
            letter-spacing: .5px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 5px;
        }

        .menu a {
            display: block;
            padding: 12px 14px;
            color: #bbb;
            text-decoration: none;
            border-radius: 7px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu .active {
            background: #fff;
            color: #111;
        }

        /* CONTENT */
        .content {
            flex: 1;
            min-width: 0;
        }

        /* NAVBAR */
        .navbar {
            background: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e5e5;
        }

        .navbar h1 {
            font-size: 22px;
            font-weight: 700;
        }

        .admin-area {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .admin-name {
            font-size: 14px;
            font-weight: 600;
        }

        .logout {
            background: #111;
            color: white;
            border: none;
            padding: 9px 14px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
        }

        /* MAIN */
        .main {
            padding: 35px;
        }

        .welcome {
            margin-bottom: 28px;
        }

        .welcome small {
            display: block;
            color: #777;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .welcome h2 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .welcome p {
            color: #777;
            font-size: 14px;
        }

        /* STATS */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .card {
            background: white;
            padding: 24px;
            border: 1px solid #e5e5e5;
            border-radius: 14px;
        }

        .card h3 {
            font-size: 13px;
            color: #777;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .card .number {
            font-size: 30px;
            font-weight: 800;
            color: #111;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .main {
                padding: 22px;
            }

            .navbar {
                padding: 16px 20px;
            }

            .admin-name {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="logo">
            YUNHA AUTO
        </div>

        <div class="menu-title">
            MENU UTAMA
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}" class="active">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.cars.index') }}">
                    Mobil
                </a>
            </li>

            <li>
                <a href="{{ route('admin.brands.index') }}">
                    Brand
                </a>
            </li>

            <li>
                <a href="{{ route('admin.test-drive.index') }}">
                    Test Drive
                </a>
            </li>

            <li>
                <a href="{{ route('admin.wishlist.index') }}">
                    Wishlist
                </a>
            </li>

<li>
    <a href="{{ route('admin.users.index') }}">
        Users
    </a>
</li>

<li>
    <a href="{{ route('admin.reservations.index') }}">
        Reservasi
    </a>
</li>

<li>
    <a href="{{ route('admin.payments.index') }}">
        Pembayaran
    </a>
</li>

        </ul>

    </aside>


    {{-- CONTENT --}}
    <div class="content">

        {{-- NAVBAR --}}
        <nav class="navbar">

            <h1>Dashboard</h1>

            <div class="admin-area">

                <div class="admin-name">
                    {{ auth()->user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout">
                        Logout
                    </button>
                </form>

            </div>

        </nav>


        {{-- MAIN --}}
        <main class="main">

            <div class="welcome">

                <small>YUNHA AUTO</small>

                <h2>
                    Selamat Datang 👋
                </h2>

                <p>
                    Kelola data showroom Yunha Auto melalui dashboard ini.
                </p>

            </div>


            {{-- STATISTICS --}}
            <div class="stats">

                <div class="card">
                    <h3>Total Mobil</h3>

                    <div class="number">
                        {{ $totalCars }}
                    </div>
                </div>


                <div class="card">
                    <h3>Mobil Tersedia</h3>

                    <div class="number">
                        {{ $availableCars }}
                    </div>
                </div>


                <div class="card">
                    <h3>Mobil Terjual</h3>

                    <div class="number">
                        {{ $soldCars }}
                    </div>
                </div>


                <div class="card">
                    <h3>Total Brand</h3>

                    <div class="number">
                        {{ $totalBrands }}
                    </div>
                </div>


                <div class="card">
                    <h3>Total Test Drive</h3>

                    <div class="number">
                        {{ $totalTestDrives }}
                    </div>
                </div>


                <div class="card">
                    <h3>Total User</h3>

                    <div class="number">
                        {{ $totalUsers }}
                    </div>
                </div>


                <div class="card">
                    <h3>Total Reservasi</h3>

                    <div class="number">
                        {{ $totalReservations }}
                    </div>
                </div>


                <div class="card">
                    <h3>Pembayaran Pending</h3>

                    <div class="number">
                        {{ $pendingPayments }}
                    </div>
                </div>

            </div>

        </main>

    </div>

</div>

</body>
</html>
