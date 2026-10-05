<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Drive - Yunha Auto</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #222;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #111827;
            color: white;
            padding: 25px 15px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            padding: 0 15px 30px;
        }

        .menu-title {
            font-size: 11px;
            color: #9ca3af;
            padding: 0 15px 10px;
            text-transform: uppercase;
        }

        .menu a {
            display: block;
            padding: 12px 15px;
            margin-bottom: 5px;
            border-radius: 7px;
            color: #d1d5db;
            text-decoration: none;
        }

        .menu a:hover {
            background: #1f2937;
            color: white;
        }

        .menu a.active {
            background: white;
            color: #111827;
            font-weight: bold;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }

        .admin-name {
            font-weight: 600;
        }

        .logout button {
            background: none;
            border: none;
            cursor: pointer;
            color: #555;
            font-size: 14px;
        }

        .content {
            padding: 30px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 6px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .alert {
            margin-bottom: 20px;
            padding: 12px 15px;
            background: #d1fae5;
            color: #065f46;
            border-radius: 8px;
        }

        .card {
            background: white;
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 1px 3px rgba(0,0,0,.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #f3f4f6;
            text-align: left;
            padding: 14px;
            font-size: 13px;
            color: #4b5563;
        }

        td {
            padding: 14px;
            border-top: 1px solid #eee;
            font-size: 14px;
        }

        .car-name {
            font-weight: 600;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .approved {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .rejected {
            background: #fee2e2;
            color: #b91c1c;
        }

        .completed {
            background: #d1fae5;
            color: #065f46;
        }

        select {
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: white;
        }

        .save-btn {
            background: #111827;
            color: white;
            border: none;
            padding: 7px 12px;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 5px;
        }

        .save-btn:hover {
            background: #000;
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="logo">
            YUNHA AUTO
        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <div class="menu">

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.cars.index') }}">
                Mobil
            </a>

            <a href="{{ route('admin.brands.index') }}">
                Brand
            </a>

            <a href="{{ route('admin.test-drive.index') }}" class="active">
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

        </div>

    </aside>


    {{-- MAIN --}}
    <main class="main">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="admin-name">
                Admin Yunha Auto
            </div>

            <div class="logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">
                        Logout
                    </button>
                </form>
            </div>

        </div>


        {{-- CONTENT --}}
        <div class="content">

            <div class="header">
                <h1>Pengajuan Test Drive</h1>
                <p>Kelola pengajuan test drive dari customer.</p>
            </div>


            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif


            <div class="card">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Mobil</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($testDrives as $testDrive)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $testDrive->user->name }}
                                </td>

                                <td class="car-name">
                                    {{ $testDrive->car->name }}
                                </td>

                                <td>
                                    {{ $testDrive->date }}
                                </td>

                                <td>
                                    {{ $testDrive->time }}
                                </td>

                                <td>
                                    {{ $testDrive->phone }}
                                </td>

                                <td>
                                    @php
                                        $statusClass = match ($testDrive->status) {
                                            'pending' => 'pending',
                                            'approved' => 'approved',
                                            'completed' => 'completed',
                                            'cancelled' => 'rejected',
                                            default => 'pending',
                                        };
                                    @endphp

                                    <span class="status {{ $statusClass }}">
                                        {{ ucfirst($testDrive->status) }}
                                    </span>
                                </td>

                                <td>

                                    <form
                                        action="{{ route('admin.test-drive.update', $testDrive->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PUT')

                                        <select name="status">

                                            <option value="pending" {{ $testDrive->status === 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="approved" {{ $testDrive->status === 'approved' ? 'selected' : '' }}>
                                                Approved
                                            </option>

                                            <option value="completed" {{ $testDrive->status === 'completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>

                                            <option value="cancelled" {{ $testDrive->status === 'cancelled' ? 'selected' : '' }}>
                                                Cancelled
                                            </option>

                                        </select>

                                        <button type="submit" class="save-btn">
                                            Simpan
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" style="text-align:center;padding:30px;color:#666;">
                                    Belum ada pengajuan test drive.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</body>
</html>
