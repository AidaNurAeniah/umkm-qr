<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ $umkm->nama_umkm }} - Profil UMKM</title>


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


        /* =====================================
           HERO
        ===================================== */

        .hero {

            position: relative;

            height: 360px;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb 55%,
                    #38bdf8
                );

        }


        .hero img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            display: block;

        }


        .hero-overlay {

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    to bottom,
                    rgba(30, 58, 138, 0.05),
                    rgba(30, 58, 138, 0.25),
                    rgba(30, 58, 138, 0.92)
                );

        }


        /* dekorasi */

        .hero::before {

            content: "";

            position: absolute;

            width: 220px;

            height: 220px;

            border-radius: 50%;

            background: rgba(255,255,255,0.09);

            right: -70px;

            top: -110px;

            z-index: 2;

        }


        .hero::after {

            content: "";

            position: absolute;

            width: 130px;

            height: 130px;

            border-radius: 50%;

            background: rgba(255,255,255,0.08);

            left: -45px;

            bottom: -70px;

            z-index: 2;

        }


        .hero-content {

            position: absolute;

            z-index: 5;

            bottom: 38px;

            left: 0;

            right: 0;

            text-align: center;

            color: white;

            padding: 0 20px;

        }


        .badge {

            display: inline-block;

            background: rgba(255,255,255,0.94);

            color: #2563eb;

            padding: 7px 15px;

            border-radius: 30px;

            font-size: 12px;

            font-weight: 750;

            margin-bottom: 12px;

            box-shadow:
                0 5px 15px rgba(0,0,0,0.12);

        }


        .hero-title {

            font-size: 34px;

            font-weight: 800;

            line-height: 1.2;

            text-shadow:
                0 3px 15px rgba(0,0,0,0.20);

        }


        .hero-subtitle {

            margin-top: 8px;

            font-size: 14px;

            opacity: 0.92;

        }


        /* =====================================
           CONTAINER
        ===================================== */

        .container {

            max-width: 760px;

            margin: -45px auto 0;

            padding: 0 16px 40px;

            position: relative;

            z-index: 10;

        }


        /* =====================================
           CARD
        ===================================== */

        .card {

            background: white;

            border-radius: 24px;

            overflow: hidden;

            border: 1px solid #dbeafe;

            box-shadow:
                0 15px 40px rgba(30, 58, 138, 0.12);

        }


        .content {

            padding: 30px;

        }


        /* =====================================
           NAMA
        ===================================== */

        .heading {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 15px;

            margin-bottom: 24px;

        }


        .nama {

            font-size: 28px;

            font-weight: 800;

            color: #1e3a8a;

            line-height: 1.3;

        }


        .verified {

            flex-shrink: 0;

            width: 43px;

            height: 43px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #dbeafe;

            color: #2563eb;

            font-size: 22px;

            font-weight: bold;

        }


        /* =====================================
           ACTION BUTTON
        ===================================== */

        .actions {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 10px;

            margin-bottom: 30px;

        }


        .button {

            display: flex;

            justify-content: center;

            align-items: center;

            gap: 8px;

            padding: 13px 15px;

            border-radius: 11px;

            text-decoration: none;

            font-size: 14px;

            font-weight: 750;

            transition: 0.2s;

        }


        .button:hover {

            transform: translateY(-2px);

        }


        .button-wa {

            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb
                );

            color: white;

            box-shadow:
                0 7px 18px rgba(37, 99, 235, 0.22);

        }


        .button-wa:hover {

            color: white;

            box-shadow:
                0 10px 23px rgba(37, 99, 235, 0.30);

        }


        .button-maps {

            background: #dbeafe;

            color: #2563eb;

        }


        .button-maps:hover {

            background: #bfdbfe;

            color: #1e3a8a;

        }


        /* =====================================
           SECTION TITLE
        ===================================== */

        .section-title {

            display: flex;

            align-items: center;

            gap: 10px;

            color: #1e3a8a;

            font-size: 17px;

            font-weight: 800;

            margin-bottom: 15px;

        }


        .section-icon {

            width: 36px;

            height: 36px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #dbeafe;

            color: #2563eb;

            border-radius: 10px;

            font-size: 17px;

        }


        /* =====================================
           INFORMASI
        ===================================== */

        .info-list {

            margin-bottom: 28px;

        }


        .info-item {

            display: flex;

            align-items: flex-start;

            gap: 13px;

            padding: 15px;

            margin-bottom: 10px;

            border-radius: 13px;

            background: #f8fbff;

            border: 1px solid #dbeafe;

        }


        .info-icon {

            width: 39px;

            height: 39px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #dbeafe;

            color: #2563eb;

            border-radius: 10px;

            font-size: 17px;

        }


        .label {

            font-size: 11px;

            color: #64748b;

            font-weight: 750;

            text-transform: uppercase;

            letter-spacing: 0.4px;

            margin-bottom: 3px;

        }


        .value {

            font-size: 14px;

            color: #1e293b;

            font-weight: 500;

            line-height: 1.6;

            word-break: break-word;

        }


        /* =====================================
           DESKRIPSI
        ===================================== */

        .description-box {

            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #f8fbff
                );

            border: 1px solid #dbeafe;

            border-radius: 16px;

            padding: 20px;

            margin-bottom: 28px;

        }


        .description {

            color: #475569;

            font-size: 14px;

            line-height: 1.8;

        }


        /* =====================================
           PRODUK
        ===================================== */

        .product-box {

            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb 60%,
                    #38bdf8
                );

            color: white;

            padding: 23px;

            border-radius: 17px;

            margin-bottom: 28px;

            box-shadow:
                0 10px 25px rgba(37, 99, 235, 0.18);

        }


        .product-box::before {

            content: "";

            position: absolute;

            width: 120px;

            height: 120px;

            border-radius: 50%;

            background: rgba(255,255,255,0.10);

            right: -35px;

            top: -40px;

        }


        .product-label {

            position: relative;

            z-index: 2;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: 1px;

            opacity: 0.85;

            margin-bottom: 8px;

            font-weight: 650;

        }


        .product {

            position: relative;

            z-index: 2;

            font-size: 20px;

            font-weight: 800;

            line-height: 1.4;

        }


        /* =====================================
           SOSIAL MEDIA
        ===================================== */

        .social-list {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            margin-bottom: 5px;

        }


        .social {

            display: flex;

            align-items: center;

            gap: 7px;

            padding: 10px 14px;

            background: #f8fbff;

            border: 1px solid #dbeafe;

            color: #2563eb;

            text-decoration: none;

            border-radius: 10px;

            font-size: 13px;

            font-weight: 700;

            transition: 0.2s;

        }


        .social:hover {

            background: #dbeafe;

            color: #1e3a8a;

        }


        /* =====================================
           FOOTER
        ===================================== */

        .footer {

            text-align: center;

            color: #64748b;

            font-size: 12px;

            padding: 20px 10px 5px;

        }


        .footer-line {

            width: 45px;

            height: 3px;

            background: #2563eb;

            border-radius: 10px;

            margin: 0 auto 10px;

        }


        /* =====================================
           MOBILE
        ===================================== */

        @media (max-width: 600px) {


            .hero {

                height: 300px;

            }


            .hero-content {

                bottom: 30px;

            }


            .hero-title {

                font-size: 25px;

            }


            .hero-subtitle {

                font-size: 12px;

            }


            .container {

                margin-top: -35px;

                padding-left: 12px;

                padding-right: 12px;

            }


            .card {

                border-radius: 21px;

            }


            .content {

                padding: 21px 17px;

            }


            .nama {

                font-size: 23px;

            }


            .verified {

                width: 38px;

                height: 38px;

                font-size: 19px;

            }


            .actions {

                grid-template-columns: 1fr;

            }


            .info-item {

                padding: 13px;

            }


            .value {

                font-size: 13px;

            }


            .description-box {

                padding: 17px;

            }


            .description {

                font-size: 13px;

            }


            .product {

                font-size: 18px;

            }


            .social {

                flex: 1 1 calc(50% - 10px);

                justify-content: center;

            }

        }

    </style>

</head>


<body>


<!-- ==========================================
     HERO
========================================== -->

<div class="hero">


    @if($umkm->foto)

        <img
            src="{{ asset('storage/' . $umkm->foto) }}"
            alt="{{ $umkm->nama_umkm }}"
        >

    @else

        <div
            style="
                width:100%;
                height:100%;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:75px;
                color:white;
            "
        >
            🏪
        </div>

    @endif


    <div class="hero-overlay"></div>


    <div class="hero-content">

        <div class="badge">

            ✓ UMKM DESA KARYAMUKTI

        </div>


        <div class="hero-title">

            {{ $umkm->nama_umkm }}

        </div>


        <div class="hero-subtitle">

            Profil Digital UMKM

        </div>

    </div>

</div>



<!-- ==========================================
     CONTENT
========================================== -->

<div class="container">


    <div class="card">


        <div class="content">


            <!-- NAMA -->

            <div class="heading">

                <div class="nama">

                    {{ $umkm->nama_umkm }}

                </div>


                <div class="verified">

                    ✓

                </div>

            </div>



            <!-- ACTION -->

            @if($umkm->whatsapp || $umkm->maps)

                <div class="actions">


                    @if($umkm->whatsapp)

                        @php

                            $nomorWa = preg_replace(
                                '/[^0-9]/',
                                '',
                                $umkm->whatsapp
                            );

                            if (
                                substr($nomorWa, 0, 1) === '0'
                            ) {

                                $nomorWa =
                                    '62' .
                                    substr(
                                        $nomorWa,
                                        1
                                    );

                            }

                        @endphp


                        <a
                            href="https://wa.me/{{ $nomorWa }}"
                            target="_blank"
                            class="button button-wa"
                        >

                            💬 Hubungi WhatsApp

                        </a>

                    @endif


                    @if($umkm->maps)

                        <a
                            href="{{ $umkm->maps }}"
                            target="_blank"
                            class="button button-maps"
                        >

                            📍 Lihat Lokasi

                        </a>

                    @endif


                </div>

            @endif



            <!-- INFORMASI -->

            <div class="section-title">

                <div class="section-icon">

                    🏪

                </div>

                Informasi Usaha

            </div>


            <div class="info-list">


                @if($umkm->nama_pemilik)

                    <div class="info-item">

                        <div class="info-icon">

                            👤

                        </div>


                        <div>

                            <div class="label">
                                Nama Pemilik
                            </div>

                            <div class="value">

                                {{ $umkm->nama_pemilik }}

                            </div>

                        </div>

                    </div>

                @endif



                @if($umkm->whatsapp)

                    <div class="info-item">

                        <div class="info-icon">

                            💬

                        </div>


                        <div>

                            <div class="label">
                                Nomor WhatsApp
                            </div>

                            <div class="value">

                                {{ $umkm->whatsapp }}

                            </div>

                        </div>

                    </div>

                @endif



                @if($umkm->alamat)

                    <div class="info-item">

                        <div class="info-icon">

                            📍

                        </div>


                        <div>

                            <div class="label">
                                Alamat
                            </div>

                            <div class="value">

                                {{ $umkm->alamat }}

                            </div>

                        </div>

                    </div>

                @endif


            </div>



            <!-- DESKRIPSI -->

            @if($umkm->deskripsi)

                <div class="section-title">

                    <div class="section-icon">

                        ℹ

                    </div>

                    Tentang Usaha

                </div>


                <div class="description-box">

                    <div class="description">

                        {{ $umkm->deskripsi }}

                    </div>

                </div>

            @endif



            <!-- PRODUK -->

            @if($umkm->produk_unggulan)

                <div class="section-title">

                    <div class="section-icon">

                        ★

                    </div>

                    Produk Unggulan

                </div>


                <div class="product-box">


                    <div class="product-label">

                        Produk yang ditawarkan

                    </div>


                    <div class="product">

                        {{ $umkm->produk_unggulan }}

                    </div>


                </div>

            @endif



            <!-- SOSIAL MEDIA -->

            @if(
                $umkm->instagram ||
                $umkm->facebook ||
                $umkm->tiktok
            )

                <div class="section-title">

                    <div class="section-icon">

                        ↗

                    </div>

                    Media Sosial

                </div>


                <div class="social-list">


                    @if($umkm->instagram)

                        @php

                            $instagram =
                                trim($umkm->instagram);

                            if (
                                !preg_match(
                                    '/^https?:\/\//i',
                                    $instagram
                                )
                            ) {

                                $instagram =
                                    'https://instagram.com/' .
                                    ltrim(
                                        $instagram,
                                        '@/'
                                    );

                            }

                        @endphp


                        <a
                            href="{{ $instagram }}"
                            target="_blank"
                            class="social"
                        >

                            ◎ Instagram

                        </a>

                    @endif



                    @if($umkm->facebook)

                        @php

                            $facebook =
                                trim($umkm->facebook);

                            if (
                                !preg_match(
                                    '/^https?:\/\//i',
                                    $facebook
                                )
                            ) {

                                $facebook =
                                    'https://facebook.com/' .
                                    ltrim(
                                        $facebook,
                                        '@/'
                                    );

                            }

                        @endphp


                        <a
                            href="{{ $facebook }}"
                            target="_blank"
                            class="social"
                        >

                            f Facebook

                        </a>

                    @endif



                    @if($umkm->tiktok)

                        @php

                            $tiktok =
                                trim($umkm->tiktok);

                            if (
                                !preg_match(
                                    '/^https?:\/\//i',
                                    $tiktok
                                )
                            ) {

                                $tiktok =
                                    'https://tiktok.com/@' .
                                    ltrim(
                                        $tiktok,
                                        '@/'
                                    );

                            }

                        @endphp


                        <a
                            href="{{ $tiktok }}"
                            target="_blank"
                            class="social"
                        >

                            ♪ TikTok

                        </a>

                    @endif


                </div>

            @endif


        </div>

    </div>



    <!-- FOOTER -->

    <div class="footer">

        <div class="footer-line"></div>

        <div>
            Profil Digital UMKM Desa Karyamukti
        </div>

        <div style="margin-top:4px;">
            Informasi usaha untuk masyarakat
        </div>

    </div>


</div>


</body>

</html>