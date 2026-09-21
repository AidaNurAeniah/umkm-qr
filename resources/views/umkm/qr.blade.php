<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        QR Code - {{ $umkm->nama_umkm }}
    </title>


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            font-family:
                "Segoe UI",
                Arial,
                sans-serif;

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

            min-height: 100vh;
        }


        .container-qr {

            max-width: 700px;

            margin: 0 auto;

            padding: 35px 15px;
        }


        .qr-card {

            background: white;

            border-radius: 25px;

            padding: 35px;

            text-align: center;

            box-shadow:
                0 12px 35px
                rgba(30, 58, 138, 0.12);

            border:
                1px solid #dbeafe;
        }


        .qr-header {

            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb,
                    #38bdf8
                );

            color: white;

            border-radius: 20px;

            padding: 25px;

            margin-bottom: 30px;
        }


        .qr-header h2 {

            margin-bottom: 8px;

            font-weight: 800;
        }


        .qr-header p {

            margin: 0;

            opacity: 0.9;

            font-size: 14px;
        }


        .qr-box {

            background: white;

            display: inline-block;

            padding: 20px;

            border-radius: 18px;

            border:
                2px solid #dbeafe;

            box-shadow:
                0 8px 25px
                rgba(37, 99, 235, 0.08);
        }


        .qr-box img {

            display: block;

            width: 400px;

            max-width: 100%;

            height: auto;
        }


        .info {

            color: #64748b;

            font-size: 14px;

            line-height: 1.6;

            margin:
                22px auto
                25px;

            max-width: 500px;
        }


        .buttons {

            display: flex;

            justify-content: center;

            gap: 10px;

            flex-wrap: wrap;
        }


        .btn-download {

            display: inline-block;

            background: #2563eb;

            color: white;

            text-decoration: none;

            padding:
                12px 22px;

            border-radius: 10px;

            font-weight: 700;

            transition: 0.2s;
        }


        .btn-download:hover {

            background: #1e3a8a;

            color: white;

            transform:
                translateY(-2px);
        }


        .btn-back {

            display: inline-block;

            background: white;

            color: #2563eb;

            text-decoration: none;

            border:
                1px solid #bfdbfe;

            padding:
                12px 22px;

            border-radius: 10px;

            font-weight: 700;

            transition: 0.2s;
        }


        .btn-back:hover {

            background: #eff6ff;

            color: #1e3a8a;
        }


        @media (max-width: 500px) {

            .container-qr {

                padding:
                    20px 10px;
            }


            .qr-card {

                padding: 22px;
            }


            .qr-header {

                padding: 20px;
            }


            .qr-box {

                padding: 12px;
            }


            .buttons a {

                width: 100%;
            }

        }

    </style>

</head>


<body>


<div class="container-qr">


    <div class="qr-card">


        <!-- HEADER -->

        <div class="qr-header">

            <h2>
                QR Code UMKM
            </h2>

            <p>
                {{ $umkm->nama_umkm }}
            </p>

        </div>


        <!-- QR CODE -->

        <div class="qr-box">

            <img
                src="{{ route('umkm.qr.image', $umkm->slug) }}"
                alt="QR Code {{ $umkm->nama_umkm }}"
            >

        </div>


        <!-- KETERANGAN -->

        <div class="info">

            Scan QR Code menggunakan kamera HP
            untuk melihat informasi
            {{ $umkm->nama_umkm }}.

        </div>


        <!-- TOMBOL -->

        <div class="buttons">

            <a
                href="{{ route('umkm.qr.download', $umkm->slug) }}"
                class="btn-download"
            >
                ⬇ Download QR Code
            </a>


            <a
                href="{{ route('umkm.index') }}"
                class="btn-back"
            >
                ← Kembali
            </a>

        </div>


    </div>


</div>


</body>

</html>