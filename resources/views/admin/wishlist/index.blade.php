<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wishlist - Yunha Auto</title>

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

        .content {
            flex: 1;
            min-width: 0;
        }

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

        .table-card {
            background: white;
            padding: 24px;
            border: 1px solid #e5e5e5;
            border-radius: 14px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background: #111;
            color: white;
            text-align: left;
            padding: 14px;
            font-size: 13px;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #e5e5e5;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .muted {
            color: #777;
            font-size: 12px;
            margin-top: 4px;
        }

        .empty {
            text-align: center;
            padding: 45px;
            color: #777;
        }

        @media (max-width: 650px) {
            .sidebar {
                display: none;
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

    <aside class="sidebar">

        <div class="logo">
            YUNHA AUTO
        </div>

        <div class="menu-title">
            MENU UTAMA
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('admin.dashboard') }}">
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
                <a href="{{ route('admin.wishlist.index') }}" class="active">
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
                <a href="{{ route('admin.payments.index') }}">
                    Pembayaran
                </a>
            </li>

        </ul>

    </aside>


    <div class="content">

        <nav class="navbar">

            <h1>Wishlist</h1>

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


        <main class="main">

            <div class="welcome">

                <small>YUNHA AUTO</small>

                <h2>
                    Wishlist Customer
                </h2>

                <p>
                    Daftar mobil yang disimpan oleh customer.
                </p>

            </div>


            <div class="table-card">

                <table>

                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Mobil</th>
                            <th>Brand</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($wishlists as $wishlist)

                            <tr>

                                <td>
                                    <strong>
                                        {{ $wishlist->user->name }}
                                    </strong>

                                    <div class="muted">
                                        {{ $wishlist->user->email }}
                                    </div>
                                </td>

                                <td>
                                    {{ $wishlist->car->name }}
                                </td>

                                <td>
                                    {{ $wishlist->car->brand->name }}
                                </td>

                                <td>
                                    Rp {{ number_format($wishlist->car->price, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $wishlist->created_at->format('d/m/Y H:i') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="empty">
                                    Belum ada wishlist customer.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </main>

    </div>

</div>

</body>
</html>