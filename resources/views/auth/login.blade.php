<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Yunha Auto</title>

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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .brand {
            text-align: center;
            margin-bottom: 25px;
        }

        .brand h1 {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand p {
            color: #777;
            font-size: 14px;
            margin-top: 6px;
        }

        .login-card {
            background: white;
            border: 1px solid #e5e5e5;
            border-radius: 14px;
            padding: 32px;
        }

        .login-card h2 {
            font-size: 24px;
            margin-bottom: 7px;
        }

        .login-card .subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #111;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #555;
        }

        .remember input {
            width: 15px;
            height: 15px;
        }

        .button {
            width: 100%;
            background: #111;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .button:hover {
            background: #333;
        }

        .error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 11px 13px;
            border-radius: 7px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .register {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: #777;
        }

        .register a {
            color: #111;
            font-weight: 600;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }

        .back {
            text-align: center;
            margin-top: 18px;
        }

        .back a {
            color: #777;
            text-decoration: none;
            font-size: 13px;
        }

        .back a:hover {
            color: #111;
        }

        @media (max-width: 500px) {
            .login-card {
                padding: 25px;
            }

            .brand h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="brand">
        <h1>YUNHA AUTO</h1>
        <p>Showroom Mobil Terpercaya</p>
    </div>

    <div class="login-card">

        <h2>Selamat Datang</h2>

        <p class="subtitle">
            Silakan masuk ke akun Anda.
        </p>

        @if ($errors->any())
            <div class="error">
                Email atau password yang Anda masukkan salah.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Masukkan email"
                >
            </div>

            <div class="form-group">
                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password"
                >
            </div>

            <label class="remember">
                <input
                    type="checkbox"
                    name="remember"
                >

                Ingat saya
            </label>

            <button type="submit" class="button">
                Login
            </button>

        </form>

        <div class="register">
            Belum punya akun?
            <a href="{{ route('register') }}">
                Daftar sekarang
            </a>
        </div>

        <div class="back">
            <a href="{{ route('cars.index') }}">
                ← Kembali ke katalog
            </a>
        </div>

    </div>

</div>

</body>
</html>