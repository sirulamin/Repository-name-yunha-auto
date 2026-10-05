<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mobil - Yunha Auto</title>

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

        .navbar {
            background: #fff;
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
            color: #fff;
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

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-header small {
            display: block;
            color: #777;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .page-header h2 {
            font-size: 28px;
            font-weight: 800;
        }

        .page-header p {
            margin-top: 7px;
            color: #777;
            font-size: 14px;
        }

        .add-button {
            display: inline-block;
            background: #111;
            color: #fff;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            white-space: nowrap;
        }

        .success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* TABLE */
        .table-wrapper {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 14px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        thead {
            background: #fafafa;
        }

        th {
            padding: 16px;
            text-align: left;
            color: #666;
            font-size: 12px;
            font-weight: 700;
            border-bottom: 1px solid #e5e5e5;
        }

        td {
            padding: 16px;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .car-name {
            font-weight: 700;
        }

        .brand {
            color: #555;
        }

        .price {
            font-weight: 700;
        }

        /* STATUS */
        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
        }

        .available {
            background: #dcfce7;
            color: #166534;
        }

        .booked {
            background: #fef3c7;
            color: #92400e;
        }

        .sold {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ACTION */
        .action {
            display: flex;
            gap: 7px;
        }

        .edit {
            display: inline-block;
            background: #111;
            color: #fff;
            padding: 7px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .delete {
            background: #fff;
            color: #dc2626;
            border: 1px solid #fca5a5;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .empty {
            padding: 45px !important;
            text-align: center;
            color: #777;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {

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

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .add-button {
                width: 100%;
                text-align: center;
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
                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.cars.index') }}" class="active">
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
                <a href="{{ route('admin.reservations.index') }}">
                    Reservasi
                </a>
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

            <h1>Data Mobil</h1>

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

            <div class="page-header">

                <div>

                    <small>YUNHA AUTO</small>

                    <h2>
                        Data Mobil
                    </h2>

                    <p>
                        Kelola seluruh data mobil yang tersedia di showroom.
                    </p>

                </div>

                <a
                    href="{{ route('admin.cars.create') }}"
                    class="add-button"
                >
                    + Tambah Mobil
                </a>

            </div>


            {{-- SUCCESS --}}
            @if (session('success'))

                <div class="success">
                    {{ session('success') }}
                </div>

            @endif


            {{-- TABLE --}}
            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Brand</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($cars as $car)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="car-name">
                                    {{ $car->name }}
                                </td>

                                <td class="brand">
                                    {{ $car->brand->name }}
                                </td>

                                <td>
                                    {{ $car->year }}
                                </td>

                                <td class="price">
                                    Rp {{ number_format($car->price, 0, ',', '.') }}
                                </td>

                                <td>

                                    @if ($car->status === 'Available')

                                        <span class="status available">
                                            Available
                                        </span>

                                    @elseif ($car->status === 'Booked')

                                        <span class="status booked">
                                            Booked
                                        </span>

                                    @else

                                        <span class="status sold">
                                            Sold
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="action">

                                        <a
                                            href="{{ route('admin.cars.edit', $car->id) }}"
                                            class="edit"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.cars.destroy', $car->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus mobil ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="empty">
                                    Belum ada data mobil.
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
