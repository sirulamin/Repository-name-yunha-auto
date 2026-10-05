<x-app-layout>




    <div style="
        background:#f5f5f5;
        min-height:calc(100vh - 65px);
        padding:40px 24px 70px;
    ">

        <div style="
            max-width:1100px;
            margin:auto;
        ">

            {{-- HEADER --}}
            <div style="margin-bottom:28px;">

                <h1 style="
                    margin:0;
                    font-size:28px;
                    font-weight:800;
                    color:#111;
                ">
                    Pengajuan Test Drive Saya
                </h1>

                <p style="
                    margin:7px 0 0;
                    color:#777;
                    font-size:14px;
                ">
                    Pantau jadwal dan status pengajuan test drive kamu.
                </p>

            </div>


            @if ($testDrives->count())

                {{-- LIST --}}
                <div style="
                    display:flex;
                    flex-direction:column;
                    gap:18px;
                ">

                    @foreach ($testDrives as $testDrive)

                        @php
                            $car = $testDrive->car;

                            $primaryImage = $car->images->firstWhere('is_primary', true)
                                ?? $car->images->first();

                            $status = strtolower($testDrive->status);

                            if ($status === 'approved') {
                                $statusBackground = '#dcfce7';
                                $statusColor = '#166534';
                            } elseif ($status === 'cancelled') {
                                $statusBackground = '#fee2e2';
                                $statusColor = '#991b1b';
                            } elseif ($status === 'completed') {
                                $statusBackground = '#e0e7ff';
                                $statusColor = '#3730a3';
                            } else {
                                $statusBackground = '#fef3c7';
                                $statusColor = '#92400e';
                            }
                        @endphp


                        <div style="
                            background:#fff;
                            border:1px solid #e5e5e5;
                            border-radius:14px;
                            overflow:hidden;
                        ">

                            <div style="
                                display:grid;
                                grid-template-columns:260px 1fr;
                                min-height:210px;
                            ">

                                {{-- IMAGE --}}
                                <div>

                                    @if ($primaryImage)

                                        <img
                                            src="{{ asset('storage/' . $primaryImage->image) }}"
                                            alt="{{ $car->name }}"
                                            style="
                                                width:100%;
                                                height:100%;
                                                min-height:210px;
                                                object-fit:cover;
                                                display:block;
                                            "
                                        >

                                    @else

                                        <div style="
                                            height:100%;
                                            min-height:210px;
                                            background:#eee;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            color:#999;
                                        ">
                                            Tidak ada gambar
                                        </div>

                                    @endif

                                </div>


                                {{-- INFORMATION --}}
                                <div style="
                                    padding:25px;
                                ">

                                    <div style="
                                        display:flex;
                                        justify-content:space-between;
                                        align-items:flex-start;
                                        gap:15px;
                                    ">

                                        <div>

                                            <p style="
                                                margin:0;
                                                color:#777;
                                                font-size:13px;
                                                font-weight:600;
                                            ">
                                                {{ $car->brand->name ?? 'Tanpa Brand' }}
                                            </p>

                                            <h2 style="
                                                margin:4px 0 0;
                                                font-size:23px;
                                                font-weight:800;
                                                color:#111;
                                            ">
                                                {{ $car->name }}
                                            </h2>

                                        </div>


                                        {{-- STATUS --}}
                                        <span style="
                                            display:inline-block;
                                            padding:7px 11px;
                                            border-radius:20px;
                                            background:{{ $statusBackground }};
                                            color:{{ $statusColor }};
                                            font-size:11px;
                                            font-weight:700;
                                            white-space:nowrap;
                                        ">
                                            {{ strtoupper($testDrive->status) }}
                                        </span>

                                    </div>


                                    {{-- DETAILS --}}
                                    <div style="
                                        display:grid;
                                        grid-template-columns:repeat(3,1fr);
                                        gap:10px;
                                        margin-top:20px;
                                    ">

                                        <div style="
                                            background:#f5f5f5;
                                            border-radius:8px;
                                            padding:11px;
                                        ">
                                            <div style="
                                                color:#888;
                                                font-size:11px;
                                            ">
                                                Tanggal
                                            </div>

                                            <div style="
                                                margin-top:4px;
                                                font-size:13px;
                                                font-weight:700;
                                            ">
                                                {{ \Carbon\Carbon::parse($testDrive->date)->format('d-m-Y') }}
                                            </div>
                                        </div>


                                        <div style="
                                            background:#f5f5f5;
                                            border-radius:8px;
                                            padding:11px;
                                        ">
                                            <div style="
                                                color:#888;
                                                font-size:11px;
                                            ">
                                                Jam
                                            </div>

                                            <div style="
                                                margin-top:4px;
                                                font-size:13px;
                                                font-weight:700;
                                            ">
                                                {{ $testDrive->time }}
                                            </div>
                                        </div>


                                        <div style="
                                            background:#f5f5f5;
                                            border-radius:8px;
                                            padding:11px;
                                        ">
                                            <div style="
                                                color:#888;
                                                font-size:11px;
                                            ">
                                                Telepon
                                            </div>

                                            <div style="
                                                margin-top:4px;
                                                font-size:13px;
                                                font-weight:700;
                                            ">
                                                {{ $testDrive->phone }}
                                            </div>
                                        </div>

                                    </div>


                                    {{-- NOTES --}}
                                    @if ($testDrive->notes)

                                        <div style="
                                            margin-top:15px;
                                            padding:12px 14px;
                                            background:#fafafa;
                                            border-left:3px solid #111;
                                            border-radius:5px;
                                        ">

                                            <div style="
                                                font-size:11px;
                                                color:#888;
                                                margin-bottom:4px;
                                            ">
                                                Catatan
                                            </div>

                                            <div style="
                                                font-size:13px;
                                                color:#444;
                                            ">
                                                {{ $testDrive->notes }}
                                            </div>

                                        </div>

                                    @endif


                                    {{-- DATE CREATED --}}
                                    <p style="
                                        margin:15px 0 0;
                                        color:#999;
                                        font-size:11px;
                                    ">
                                        Diajukan pada
                                        {{ $testDrive->created_at->format('d-m-Y H:i') }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- EMPTY STATE --}}
                <div style="
                    background:#fff;
                    border:1px solid #e5e5e5;
                    border-radius:14px;
                    padding:60px 20px;
                    text-align:center;
                ">

                    <div style="
                        font-size:42px;
                        margin-bottom:15px;
                    ">
                        🚗
                    </div>

                    <h2 style="
                        margin:0;
                        font-size:22px;
                        font-weight:700;
                        color:#111;
                    ">
                        Belum Ada Pengajuan
                    </h2>

                    <p style="
                        margin:8px 0 22px;
                        color:#777;
                        font-size:14px;
                    ">
                        Kamu belum memiliki pengajuan test drive.
                    </p>

                    <a
                        href="{{ route('cars.index') }}"
                        style="
                            display:inline-block;
                            background:#111;
                            color:#fff;
                            text-decoration:none;
                            padding:12px 20px;
                            border-radius:7px;
                            font-size:14px;
                            font-weight:600;
                        "
                    >
                        Lihat Katalog Mobil
                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>