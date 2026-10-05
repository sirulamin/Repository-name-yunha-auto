<x-app-layout>
    <style>
        .wishlist-page { background:#f7f7f5; min-height:calc(100vh - 64px); padding:48px 24px 72px; }
        .wishlist-container { max-width:1200px; margin:auto; }
        .wishlist-title { margin:0; font-size:32px; font-weight:700; letter-spacing:-.6px; }
        .wishlist-subtitle { margin:8px 0 30px; color:#777; font-size:14px; }
        .wishlist-alert { background:#ecfdf3; color:#166534; border:1px solid #bbf7d0; padding:12px 16px; border-radius:8px; margin-bottom:20px; }
        .wishlist-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:22px; }
        .wishlist-card { background:#fff; border:1px solid #e5e5e5; overflow:hidden; }
        .wishlist-image { height:210px; background:#eee; overflow:hidden; }
        .wishlist-image img { width:100%; height:100%; object-fit:cover; display:block; }
        .wishlist-content { padding:20px; }
        .wishlist-brand { color:#777; font-size:13px; margin-bottom:5px; }
        .wishlist-car { margin:0 0 10px; font-size:20px; font-weight:700; }
        .wishlist-price { font-size:20px; font-weight:700; margin-bottom:15px; }
        .wishlist-meta { display:flex; gap:15px; color:#666; font-size:13px; margin-bottom:20px; }
        .wishlist-actions { display:flex; gap:8px; }
        .wishlist-detail { flex:1; text-align:center; background:#111; color:#fff; padding:10px; text-decoration:none; font-size:14px; }
        .wishlist-remove { background:#fff; color:#dc2626; border:1px solid #ddd; padding:10px 13px; cursor:pointer; }
        .wishlist-empty { background:#fff; border:1px solid #e5e5e5; padding:60px 20px; text-align:center; }
        .wishlist-empty-icon { font-size:45px; margin-bottom:15px; }
        .wishlist-empty h2 { margin:0 0 8px; }
        .wishlist-empty p { color:#777; margin:0 0 20px; }
        .wishlist-empty a { display:inline-block; background:#111; color:#fff; padding:11px 20px; text-decoration:none; }
    </style>

    <main class="wishlist-page">
        <div class="wishlist-container">
            <h1 class="wishlist-title">Wishlist Saya</h1>
            <p class="wishlist-subtitle">Mobil yang kamu simpan untuk dilihat kembali.</p>

            @if (session('success'))
                <div class="wishlist-alert">{{ session('success') }}</div>
            @endif

            @if ($wishlists->count())
                <div class="wishlist-grid">
                    @foreach ($wishlists as $wishlist)
                        @php
                            $car = $wishlist->car;
                            $image = $car->images->firstWhere('is_primary', true) ?? $car->images->first();
                        @endphp

                        <article class="wishlist-card">
                            <div class="wishlist-image">
                                @if ($image)
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $car->brand->name ?? '' }} {{ $car->name }}">
                                @else
                                    <div style="height:100%;display:flex;align-items:center;justify-content:center;color:#999;">Tidak ada foto</div>
                                @endif
                            </div>

                            <div class="wishlist-content">
                                <div class="wishlist-brand">{{ $car->brand->name ?? 'Tanpa Brand' }}</div>
                                <h2 class="wishlist-car">{{ $car->name }}</h2>
                                <div class="wishlist-price">Rp {{ number_format($car->price, 0, ',', '.') }}</div>

                                <div class="wishlist-meta">
                                    <span>{{ $car->year }}</span>
                                    <span>{{ $car->transmission }}</span>
                                    <span>{{ number_format($car->mileage, 0, ',', '.') }} km</span>
                                </div>

                                <div class="wishlist-actions">
                                    <a href="{{ route('cars.show', $car) }}" class="wishlist-detail">Lihat Detail</a>
                                    <form action="{{ route('wishlist.toggle', $car) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="wishlist-remove" aria-label="Hapus dari wishlist">♥</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="wishlist-empty">
                    <div class="wishlist-empty-icon">♡</div>
                    <h2>Wishlist masih kosong</h2>
                    <p>Simpan mobil yang kamu sukai dari katalog.</p>
                    <a href="{{ route('cars.index') }}">Lihat Katalog Mobil</a>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
