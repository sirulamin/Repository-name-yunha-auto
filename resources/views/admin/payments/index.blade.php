<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Yunha Auto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f5f5f5; color: #111; }
        .layout { display: flex; min-height: 100vh; }
        .sidebar { width: 230px; background: #050505; color: #fff; padding: 28px 18px; position: fixed; inset: 0 auto 0 0; }
        .logo { font-weight: 800; letter-spacing: 2px; font-size: 18px; margin: 0 0 38px 12px; }
        .menu { list-style: none; padding: 0; margin: 0; }
        .menu li { margin-bottom: 5px; }
        .menu a { display: block; color: #aaa; text-decoration: none; padding: 11px 12px; border-radius: 8px; font-size: 14px; }
        .menu a:hover, .menu a.active { color: #fff; background: #1a1a1a; }
        .main { margin-left: 230px; width: calc(100% - 230px); }
        .topbar { height: 72px; background: #fff; border-bottom: 1px solid #e5e5e5; display: flex; justify-content: space-between; align-items: center; padding: 0 34px; }
        .topbar h1 { font-size: 20px; margin: 0; }
        .admin-info { display: flex; align-items: center; gap: 18px; font-size: 13px; }
        .logout { border: 1px solid #111; background: #111; color: #fff; padding: 8px 13px; cursor: pointer; }
        .content { padding: 34px; }
        .alert { background: #ecfdf3; border: 1px solid #bbf7d0; color: #166534; padding: 12px 14px; margin-bottom: 18px; border-radius: 8px; }
        .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 900px; }
        th, td { padding: 15px 18px; border-bottom: 1px solid #eee; text-align: left; font-size: 13px; vertical-align: middle; }
        th { background: #fafafa; color: #666; text-transform: uppercase; letter-spacing: .08em; font-size: 10px; }
        .status { display: inline-block; padding: 6px 9px; font-size: 10px; font-weight: 700; text-transform: uppercase; border-radius: 999px; }
        .pending { background: #fff7ed; color: #9a3412; }
        .paid { background: #ecfdf3; color: #166534; }
        .cancelled { background: #fef2f2; color: #991b1b; }
        select { border: 1px solid #ddd; padding: 8px 10px; background: #fff; }
        .save { margin-left: 7px; border: 0; background: #111; color: #fff; padding: 8px 12px; cursor: pointer; }
        @media (max-width: 800px) { .sidebar { position: static; width: 100%; min-height: auto; } .layout { display: block; } .main { margin-left: 0; width: 100%; } .topbar { padding: 0 18px; } .content { padding: 18px; } }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="logo">YUNHA AUTO</div>
        <ul class="menu">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.cars.index') }}">Mobil</a></li>
            <li><a href="{{ route('admin.brands.index') }}">Brand</a></li>
            <li><a href="{{ route('admin.test-drive.index') }}">Test Drive</a></li>
            <li><a href="{{ route('admin.wishlist.index') }}">Wishlist</a></li>
            <li><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li><a href="{{ route('admin.reservations.index') }}">Reservasi</a></li>
            <li><a href="{{ route('admin.payments.index') }}" class="active">Pembayaran</a></li>
        </ul>
    </aside>

    <main class="main">
        <header class="topbar">
            <h1>Pembayaran</h1>
            <div class="admin-info">
                <span>{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>
        </header>

        <section class="content">
            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="table-wrap">
                    <table>
                        <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Customer</th>
                            <th>Mobil</th>
                            <th>Jumlah</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($payments as $payment)
                            @php
                                $statusClass = match($payment->status) {
                                    'Paid' => 'paid',
                                    'Cancelled' => 'cancelled',
                                    default => 'pending',
                                };
                            @endphp
                            <tr>
                                <td>{{ $payment->payment_code }}</td>
                                <td>{{ $payment->reservation->user->name ?? '-' }}</td>
                                <td>{{ $payment->reservation->car->brand->name ?? '' }} {{ $payment->reservation->car->name ?? '-' }}</td>
                                <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                <td>{{ $payment->method }}</td>
                                <td><span class="status {{ $statusClass }}">{{ $payment->status }}</span></td>
                                <td>
                                    <form method="POST" action="{{ route('admin.payments.update', $payment) }}">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" {{ $payment->status === 'Paid' ? 'disabled' : '' }}>
                                            @foreach(['Pending', 'Paid', 'Cancelled'] as $status)
                                                <option value="{{ $status }}" @selected($payment->status === $status)>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                        @if($payment->status !== 'Paid')
                                            <button class="save" type="submit">Simpan</button>
                                        @else
                                            <span style="font-size:11px;color:#777;">Terverifikasi</span>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" style="text-align:center;padding:40px;color:#777;">Belum ada pembayaran.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
