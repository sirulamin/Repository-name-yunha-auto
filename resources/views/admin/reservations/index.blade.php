<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservasi - Yunha Auto</title>

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

        .customer-phone {
            color: #777;
            font-size: 12px;
            margin-top: 4px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .confirmed {
            background: #d1e7dd;
            color: #0f5132;
        }

        .cancelled {
            background: #f8d7da;
            color: #842029;
        }

        .completed {
            background: #cfe2ff;
            color: #084298;
        }

        .action-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        select {
            padding: 9px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: white;
            font-size: 13px;
        }

        .update-btn {
            background: #111;
            color: white;
            border: none;
            padding: 9px 13px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .update-btn:hover {
            background: #333;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px 18px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .empty {
            text-align: center;
            padding: 45px;
            color: #777;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main {
                padding: 25px;
            }
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
                <a href="{{ route('admin.reservations.index') }}" class="active">
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

            <h1>Reservasi</h1>

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
                    Reservasi Mobil
                </h2>

                <p>
                    Kelola reservasi dan ubah status pesanan customer.
                </p>

            </div>


            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="table-card">

                <table>

                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Customer</th>
                            <th>Mobil</th>
                            <th>DP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($reservations as $reservation)

                            <tr>

                                <td>
                                    <strong>
                                        {{ $reservation->reservation_code }}
                                    </strong>
                                </td>

                                <td>
                                    <strong>
                                        {{ $reservation->user->name }}
                                    </strong>

                                    <div class="customer-phone">
                                        {{ $reservation->phone }}
                                    </div>
                                </td>

                                <td>
                                    {{ $reservation->car->brand->name }}
                                    {{ $reservation->car->name }}
                                </td>

                                <td>
                                    Rp {{ number_format($reservation->dp_amount, 0, ',', '.') }}
                                </td>

                                <td>

                                    @php
                                        $statusClass = match($reservation->status) {
                                            'Confirmed' => 'confirmed',
                                            'Cancelled' => 'cancelled',
                                            'Completed' => 'completed',
                                            default => 'pending',
                                        };
                                    @endphp

                                    <span class="status {{ $statusClass }}">
                                        {{ $reservation->status }}
                                    </span>

                                </td>

                                <td>

                                    @php
                                        $allowedStatuses = match($reservation->status) {
                                            'Pending' => ['Pending', 'Confirmed', 'Cancelled'],
                                            'Confirmed' => ['Confirmed', 'Cancelled', 'Completed'],
                                            'Cancelled' => ['Cancelled', 'Pending', 'Confirmed'],
                                            'Completed' => ['Completed'],
                                            default => ['Pending'],
                                        };
                                    @endphp

                                    <form
                                        action="{{ route('admin.reservations.update', $reservation) }}"
                                        method="POST"
                                        class="action-form">

                                        @csrf
                                        @method('PUT')

                                        <select name="status">

                                            @foreach($allowedStatuses as $status)

                                                <option
                                                    value="{{ $status }}"
                                                    @selected($reservation->status === $status)>
                                                    {{ $status }}
                                                </option>

                                            @endforeach

                                        </select>

                                        <button type="submit" class="update-btn">
                                            Update
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="empty">
                                    Belum ada reservasi.
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
