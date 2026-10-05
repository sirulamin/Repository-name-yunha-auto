<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Brand - Yunha Auto</title>
</head>

<body style="margin:0;font-family:Arial,sans-serif;background:#f5f6fa;color:#222;">

<div style="max-width:700px;margin:50px auto;background:#fff;padding:30px;border-radius:12px;">

    <h1 style="margin-top:0;">Tambah Brand</h1>

    @if ($errors->any())
        <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;margin-bottom:20px;">
            <ul style="margin:0;padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST">
        @csrf

        <label style="display:block;font-weight:600;margin-bottom:8px;">
            Nama Brand
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            placeholder="Contoh: Toyota"
            required
            style="width:100%;padding:12px;border:1px solid #ccc;border-radius:8px;box-sizing:border-box;"
        >

        <div style="margin-top:20px;display:flex;gap:10px;">

            <button
                type="submit"
                style="background:#111827;color:#fff;border:none;padding:10px 16px;border-radius:8px;cursor:pointer;">
                Simpan
            </button>

            <a
                href="{{ route('admin.brands.index') }}"
                style="background:#e5e7eb;color:#111827;padding:10px 16px;border-radius:8px;text-decoration:none;">
                Batal
            </a>

        </div>
    </form>

</div>

</body>
</html>