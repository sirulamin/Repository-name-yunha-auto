<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Brand - Yunha Auto</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #111;
        }

        .admin {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #111;
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .logo {
            padding: 24px;
            font-size: 21px;
            font-weight: 800;
            border-bottom: 1px solid #2b2b2b;
        }

        .menu-title {
            padding: 25px 24px 10px;
            font-size: 11px;
            color: #888;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            padding: 0 12px;
        }

        .menu a {
            display: block;
            padding: 13px 14px;
            margin-bottom: 4px;
            border-radius: 8px;
            color: #bdbdbd;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .menu a:hover {
            background: #242424;
            color: white;
        }

        .menu a.active {
            background: white;
            color: #111;
        }

        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 30px;
        }

        .admin-name {
            font-size: 13px;
            font-weight: 700;
            margin-right: 15px;
        }

        .logout {
            background: white;
            border: 1px solid #d1d5db;
            padding: 8px 13px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 12px;
        }

        .main {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0;
            font-size: 26px;
        }

        .page-header p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .add-button {
            background: #111;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .alert {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #fafafa;
            text-align: left;
            padding: 14px 16px;
            font-size: 12px;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 15px 16px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 13px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .brand-name {
            font-weight: 700;
        }

        .edit {
            background: #111;
            color: white;
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
        }

        .delete {
            background: #dc2626;
            color: white;
            border: none;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            margin-left: 5px;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 210px;
            }

            .content {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .main {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="admin">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="logo">
            YUNHA AUTO
        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.cars.index') }}">
                Mobil
            </a>

            <a href="{{ route('admin.brands.index') }}" class="active">
                Brand
            </a>

            <a href="{{ route('admin.test-drive.index') }}">
                Test Drive
            </a>

            <a href="{{ route('admin.wishlist.index') }}">
                Wishlist
            </a>

            <a href="{{ route('admin.users.index') }}">
                Users
            </a>
                <a href="{{ route('admin.reservations.index') }}">
                    Reservasi
                </a>
                <a href="{{ route('admin.payments.index') }}">
                    Pembayaran
                </a>

        </nav>

    </aside>


    {{-- AREA KANAN --}}
    <div class="content">

        {{-- HEADER --}}
        <header class="topbar">

            <span class="admin-name">
                {{ auth()->user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout">
                    Logout
                </button>
            </form>

        </header>


        {{-- CONTENT --}}
        <main class="main">

            <div class="page-header">

                <div>
                    <h1>Daftar Brand</h1>

                    <p>
                        Kelola brand mobil Yunha Auto.
                    </p>
                </div>

                <a
                    href="{{ route('admin.brands.create') }}"
                    class="add-button"
                >
                    + Tambah Brand
                </a>

            </div>


            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert" style="background:#fef2f2;color:#991b1b;border-color:#fecaca;">
                    {{ session('error') }}
                </div>
            @endif


            <div class="card">

                <table>

                    <thead>
                        <tr>
                            <th style="width:80px;">No</th>
                            <th>Nama Brand</th>
                            <th style="width:220px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($brands as $brand)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="brand-name">
                                    {{ $brand->name }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('admin.brands.edit', $brand) }}"
                                        class="edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.brands.destroy', $brand) }}"
                                        method="POST"
                                        style="display:inline;"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete"
                                            onclick="return confirm('Hapus brand ini?')"
                                        >
                                            Hapus
                                        </button>
                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="3"
                                    style="text-align:center;color:#6b7280;padding:30px;"
                                >
                                    Belum ada brand.
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
