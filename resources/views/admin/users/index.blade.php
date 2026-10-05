<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users - Yunha Auto</title>

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

        .user-name {
            font-weight: 700;
        }

        .role {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 999px;
            background: #f3f4f6;
            color: #374151;
            font-size: 11px;
            font-weight: 700;
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
                overflow-x: auto;
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

            <a href="{{ route('admin.brands.index') }}">
                Brand
            </a>

            <a href="{{ route('admin.test-drive.index') }}">
                Test Drive
            </a>

            <a href="{{ route('admin.wishlist.index') }}">
                Wishlist
            </a>

            <a href="{{ route('admin.users.index') }}" class="active">
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

                <h1>
                    Daftar User
                </h1>

                <p>
                    Daftar pengguna yang terdaftar di Yunha Auto.
                </p>

            </div>


            <div class="card">

                <table>

                    <thead>
                        <tr>
                            <th style="width:70px;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="user-name">
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>
                                    <span class="role">
                                        {{ $user->role }}
                                    </span>
                                </td>

                                <td>
                                    {{ $user->phone ?? '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="5"
                                    style="text-align:center;color:#6b7280;padding:30px;"
                                >
                                    Belum ada user.
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
