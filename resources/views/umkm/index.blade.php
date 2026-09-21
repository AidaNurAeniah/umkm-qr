<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar UMKM</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(56, 189, 248, 0.16),
                    transparent 30%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(37, 99, 235, 0.10),
                    transparent 35%
                ),
                #eff6ff;

            color: #1e293b;
            min-height: 100vh;
        }


        .container {
            max-width: 1150px;
            margin: auto;
            padding: 35px 20px;
        }


        /* ==============================
           HEADER
        ============================== */

        .header {
            position: relative;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;

            margin-bottom: 30px;
            padding: 32px;

            border-radius: 24px;

            color: white;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb 55%,
                    #38bdf8
                );

            box-shadow:
                0 14px 35px
                rgba(37, 99, 235, 0.22);
        }


        .header::before {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.09);

            right: -70px;
            top: -120px;
        }


        .header::after {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.08);

            right: 180px;
            bottom: -75px;
        }


        .header-content {
            position: relative;
            z-index: 2;
        }


        .header h1 {
            font-size: 32px;

            margin-bottom: 7px;

            font-weight: 800;
        }


        .header p {
            opacity: 0.92;

            font-size: 15px;
        }


        /* ==============================
           HEADER BUTTON
        ============================== */

        .header-actions {
            position: relative;
            z-index: 2;

            display: flex;

            align-items: center;

            gap: 10px;

            flex-shrink: 0;
        }


        .header-actions form {
            margin: 0;
        }


        .btn-tambah {
            position: relative;
            z-index: 2;

            background: white;

            color: #2563eb;

            text-decoration: none;

            padding: 12px 21px;

            border-radius: 12px;

            font-weight: 750;

            transition: 0.2s;

            box-shadow:
                0 6px 16px
                rgba(0, 0, 0, 0.10);
        }


        .btn-tambah:hover {
            transform: translateY(-2px);

            color: #1e3a8a;

            box-shadow:
                0 10px 22px
                rgba(0, 0, 0, 0.14);
        }


        .btn-logout {
            background: #fee2e2;

            color: #b91c1c;

            border: none;

            padding: 12px 21px;

            border-radius: 12px;

            font-weight: 750;

            font-size: 14px;

            cursor: pointer;

            transition: 0.2s;
        }


        .btn-logout:hover {
            background: #fecaca;

            color: #991b1b;

            transform: translateY(-2px);
        }


        /* ==============================
           ALERT
        ============================== */

        .alert {
            background: #dbeafe;

            color: #1e3a8a;

            border-left: 5px solid #2563eb;

            padding: 14px 18px;

            border-radius: 12px;

            margin-bottom: 25px;
        }


        /* ==============================
           GRID
        ============================== */

        .grid {
            display: grid;

            grid-template-columns:
                repeat(
                    auto-fill,
                    minmax(285px, 1fr)
                );

            gap: 24px;
        }


        /* ==============================
           CARD
        ============================== */

        .card {
            background: white;

            border-radius: 20px;

            overflow: hidden;

            box-shadow:
                0 8px 25px
                rgba(30, 58, 138, 0.08);

            transition: 0.25s;

            border: 1px solid #dbeafe;
        }


        .card:hover {
            transform: translateY(-6px);

            box-shadow:
                0 18px 38px
                rgba(30, 58, 138, 0.15);
        }


        /* ==============================
           FOTO
        ============================== */

        .foto-wrapper {
            position: relative;

            height: 205px;

            overflow: hidden;

            background: #dbeafe;
        }


        .foto {
            width: 100%;

            height: 100%;

            object-fit: cover;

            transition: 0.4s;
        }


        .card:hover .foto {
            transform: scale(1.05);
        }


        .foto-kosong {
            width: 100%;
            height: 100%;

            display: flex;

            justify-content: center;
            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #dbeafe,
                    #e0f2fe
                );

            color: #64748b;

            font-size: 15px;
        }


        .badge-umkm {
            position: absolute;

            left: 14px;
            top: 14px;

            background:
                rgba(255, 255, 255, 0.93);

            color: #2563eb;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 750;
        }


        /* ==============================
           CARD CONTENT
        ============================== */

        .content {
            padding: 20px;
        }


        .nama {
            font-size: 21px;

            font-weight: 800;

            color: #1e3a8a;

            margin-bottom: 8px;
        }


        .pemilik {
            font-size: 13px;

            color: #64748b;

            margin-bottom: 10px;
        }


        .deskripsi {
            color: #64748b;

            font-size: 14px;

            line-height: 1.6;

            min-height: 44px;
        }


        .slug {
            background: #f8fbff;

            border: 1px solid #dbeafe;

            padding: 8px 10px;

            border-radius: 9px;

            margin-top: 13px;

            font-size: 11px;

            color: #64748b;

            word-break: break-all;
        }


        /* ==============================
           ACTIONS
        ============================== */

        .actions {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 9px;

            margin-top: 16px;
        }


        .btn {
            text-align: center;

            padding: 10px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 750;

            transition: 0.2s;
        }


        .btn-detail {
            background: #dbeafe;

            color: #2563eb;
        }


        .btn-detail:hover {
            background: #bfdbfe;

            color: #1e3a8a;
        }


        .btn-qr {
            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb
                );

            color: white;
        }


        .btn-qr:hover {
            color: white;

            transform: translateY(-1px);

            box-shadow:
                0 7px 16px
                rgba(37, 99, 235, 0.28);
        }


        /* ==============================
           EMPTY
        ============================== */

        .empty {
            background: white;

            padding: 60px 20px;

            text-align: center;

            border-radius: 20px;

            color: #64748b;

            box-shadow:
                0 8px 25px
                rgba(30, 58, 138, 0.08);

            border: 1px solid #dbeafe;
        }


        .empty-icon {
            font-size: 50px;

            margin-bottom: 15px;
        }


        .empty h3 {
            color: #1e3a8a;

            margin-bottom: 8px;
        }


        /* ==============================
           MOBILE
        ============================== */

        @media (max-width: 600px) {

            .container {
                padding: 20px 12px;
            }


            .header {
                flex-direction: column;

                align-items: stretch;

                padding: 25px 20px;
            }


            .header h1 {
                font-size: 26px;
            }


            .header-actions {
                width: 100%;

                flex-direction: column;
            }


            .header-actions a,
            .header-actions form,
            .header-actions button {
                width: 100%;
            }


            .btn-tambah,
            .btn-logout {
                text-align: center;

                display: block;
            }


            .grid {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>


<body>


<div class="container">


    <!-- ==============================
         HEADER ADMIN
    ============================== -->

    <div class="header">


        <div class="header-content">

            <h1>
                Daftar UMKM DESA KARYAMUKTI
            </h1>


            <p>
                Temukan berbagai UMKM yang ada di Desa Karyamukti.
            </p>

        </div>


        <div class="header-actions">


            <!-- TAMBAH UMKM -->

            <a
                href="{{ route('umkm.create') }}"
                class="btn-tambah"
            >
                ＋ Tambah UMKM
            </a>


            <!-- LOGOUT -->

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="btn-logout"
                >
                    ↪ Logout
                </button>

            </form>


        </div>

    </div>


    <!-- ==============================
         SUCCESS MESSAGE
    ============================== -->

    @if(session('success'))

        <div class="alert">

            ✓ {{ session('success') }}

        </div>

    @endif


    <!-- ==============================
         DATA UMKM
    ============================== -->

    @if($umkms->count() > 0)


        <div class="grid">


            @foreach($umkms as $umkm)


                <div class="card">


                    <!-- FOTO -->

                    <div class="foto-wrapper">


                        @if($umkm->foto)

                            <img
                                src="{{ asset('storage/' . $umkm->foto) }}"
                                alt="{{ $umkm->nama_umkm }}"
                                class="foto"
                            >

                        @else

                            <div class="foto-kosong">

                                📷 Foto belum tersedia

                            </div>

                        @endif


                        <div class="badge-umkm">

                            UMKM

                        </div>


                    </div>


                    <!-- CONTENT -->

                    <div class="content">


                        <div class="nama">

                            {{ $umkm->nama_umkm }}

                        </div>


                        @if($umkm->nama_pemilik)

                            <div class="pemilik">

                                👤 {{ $umkm->nama_pemilik }}

                            </div>

                        @endif


                        <div class="deskripsi">


                            @if($umkm->deskripsi)

                                {{ Str::limit($umkm->deskripsi, 90) }}

                            @else

                                Belum ada deskripsi UMKM.

                            @endif


                        </div>


                        <div class="slug">

                            🔗 /umkm/{{ $umkm->slug }}

                        </div>


                        <div class="actions">


                            <!-- DETAIL -->

                            <a
                                href="{{ route('umkm.show', $umkm->slug) }}"
                                class="btn btn-detail"
                            >
                                👁 Lihat Detail
                            </a>


                            <!-- QR -->

                            <a
                                href="{{ route('umkm.qr', $umkm->slug) }}"
                                class="btn btn-qr"
                                target="_blank"
                            >
                                ▦ Lihat QR Code
                            </a>


                        </div>


                    </div>


                </div>


            @endforeach


        </div>


    @else


        <!-- DATA KOSONG -->

        <div class="empty">


            <div class="empty-icon">

                🏪

            </div>


            <h3>

                Belum ada data UMKM

            </h3>


            <p>

                Silakan tambahkan UMKM terlebih dahulu.

            </p>


        </div>


    @endif


</div>


</body>

</html>