<x-app-layout>
    <div style="
        background:#f5f5f5;
        min-height:calc(100vh - 65px);
        padding:40px 24px 70px;
    ">

        <div style="
            max-width:900px;
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
                    Pengaturan Akun
                </h1>

                <p style="
                    margin:7px 0 0;
                    color:#777;
                    font-size:14px;
                ">
                    Kelola informasi akun dan keamanan profile kamu.
                </p>

            </div>


            {{-- PROFILE INFORMATION --}}
            <div style="
                background:#fff;
                border:1px solid #e5e5e5;
                border-radius:14px;
                padding:28px;
                margin-bottom:20px;
            ">

                <div style="margin-bottom:20px;">

                    <h2 style="
                        margin:0;
                        font-size:20px;
                        font-weight:800;
                        color:#111;
                    ">
                        Informasi Profile
                    </h2>

                    <p style="
                        margin:6px 0 0;
                        color:#777;
                        font-size:13px;
                    ">
                        Perbarui nama, email, dan informasi akun kamu.
                    </p>

                </div>

                <div style="
                    border-top:1px solid #eee;
                    padding-top:22px;
                ">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>


            {{-- PASSWORD --}}
            <div style="
                background:#fff;
                border:1px solid #e5e5e5;
                border-radius:14px;
                padding:28px;
                margin-bottom:20px;
            ">

                <div style="margin-bottom:20px;">

                    <h2 style="
                        margin:0;
                        font-size:20px;
                        font-weight:800;
                        color:#111;
                    ">
                        Password
                    </h2>

                    <p style="
                        margin:6px 0 0;
                        color:#777;
                        font-size:13px;
                    ">
                        Gunakan password yang kuat untuk menjaga keamanan akun.
                    </p>

                </div>

                <div style="
                    border-top:1px solid #eee;
                    padding-top:22px;
                ">

                    @include('profile.partials.update-password-form')

                </div>

            </div>


            {{-- DELETE ACCOUNT --}}
            <div style="
                background:#fff;
                border:1px solid #e5e5e5;
                border-radius:14px;
                padding:28px;
                margin-bottom:20px;
            ">

                <div style="margin-bottom:20px;">

                    <h2 style="
                        margin:0;
                        font-size:20px;
                        font-weight:800;
                        color:#111;
                    ">
                        Hapus Akun
                    </h2>

                    <p style="
                        margin:6px 0 0;
                        color:#777;
                        font-size:13px;
                    ">
                        Menghapus akun akan menghilangkan data akun secara permanen.
                    </p>

                </div>

                <div style="
                    border-top:1px solid #eee;
                    padding-top:22px;
                ">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>


            {{-- BACK --}}
            <a
                href="{{ route('cars.index') }}"
                style="
                    display:inline-block;
                    color:#555;
                    text-decoration:none;
                    font-size:14px;
                    margin-top:5px;
                "
            >
                ← Kembali ke Katalog
            </a>

        </div>

    </div>

</x-app-layout>