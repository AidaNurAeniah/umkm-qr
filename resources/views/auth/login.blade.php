<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login Admin UMKM</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

            font-family:
                "Segoe UI",
                Arial,
                sans-serif;

            background:
                radial-gradient(
                    circle at top left,
                    rgba(56, 189, 248, 0.20),
                    transparent 30%
                ),
                radial-gradient(
                    circle at bottom right,
                    rgba(37, 99, 235, 0.18),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb 55%,
                    #38bdf8
                );

            position: relative;

            overflow: hidden;
        }


        /* =====================================
           DEKORASI BACKGROUND
        ===================================== */

        body::before {

            content: "";

            position: absolute;

            width: 300px;

            height: 300px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.08);

            top: -130px;

            left: -100px;
        }


        body::after {

            content: "";

            position: absolute;

            width: 230px;

            height: 230px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.08);

            bottom: -100px;

            right: -70px;
        }


        /* =====================================
           LOGIN CARD
        ===================================== */

        .login-card {

            position: relative;

            z-index: 5;

            width: 100%;

            max-width: 430px;

            background: white;

            border-radius: 26px;

            padding: 38px;

            box-shadow:
                0 25px 60px
                rgba(15, 23, 42, 0.28);

            border: 1px solid
                rgba(255, 255, 255, 0.7);
        }


        /* =====================================
           LOGO DESA KARYAMUKTI
        ===================================== */

        .logo {

            width: 90px;

            height: 90px;

            border-radius: 22px;

            background:
                linear-gradient(
                    135deg,
                    #dbeafe,
                    #e0f2fe
                );

            border: 1px solid #bfdbfe;

            display: flex;

            align-items: center;

            justify-content: center;

            margin: 0 auto 20px;

            padding: 10px;

            overflow: hidden;

            box-shadow:
                0 10px 25px
                rgba(37, 99, 235, 0.12);
        }


        .logo img {

            width: 100%;

            height: 100%;

            object-fit: contain;

            display: block;
        }


        /* =====================================
           TITLE
        ===================================== */

        .title {

            text-align: center;

            font-size: 28px;

            font-weight: 800;

            color: #1e3a8a;

            margin-bottom: 6px;
        }


        .subtitle {

            text-align: center;

            color: #64748b;

            font-size: 14px;

            margin-bottom: 28px;

            line-height: 1.6;
        }


        .subtitle strong {

            color: #2563eb;
        }


        /* =====================================
           ALERT
        ===================================== */

        .alert {

            padding: 12px 14px;

            border-radius: 12px;

            margin-bottom: 18px;

            font-size: 13px;

            line-height: 1.5;
        }


        .alert-danger {

            background: #fef2f2;

            color: #b91c1c;

            border: 1px solid #fecaca;
        }


        .alert-success {

            background: #eff6ff;

            color: #1e3a8a;

            border: 1px solid #bfdbfe;
        }


        /* =====================================
           FORM
        ===================================== */

        .form-group {

            margin-bottom: 19px;
        }


        .form-label {

            display: block;

            margin-bottom: 8px;

            color: #1e293b;

            font-size: 13px;

            font-weight: 750;
        }


        .form-control {

            width: 100%;

            height: 52px;

            padding: 0 15px;

            border-radius: 12px;

            border: 1px solid #cbd5e1;

            background: #f8fbff;

            color: #1e293b;

            font-size: 14px;

            outline: none;

            transition: 0.2s;
        }


        .form-control::placeholder {

            color: #94a3b8;
        }


        .form-control:focus {

            background: white;

            border-color: #2563eb;

            box-shadow:
                0 0 0 4px
                rgba(37, 99, 235, 0.10);
        }


        /* =====================================
           LOGIN BUTTON
        ===================================== */

        .btn-login {

            width: 100%;

            height: 52px;

            border: none;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #1e3a8a,
                    #2563eb
                );

            color: white;

            font-weight: 750;

            font-size: 15px;

            cursor: pointer;

            box-shadow:
                0 9px 20px
                rgba(37, 99, 235, 0.25);

            transition: 0.2s;
        }


        .btn-login:hover {

            transform: translateY(-2px);

            background:
                linear-gradient(
                    135deg,
                    #172f73,
                    #1d4ed8
                );

            box-shadow:
                0 13px 26px
                rgba(37, 99, 235, 0.32);
        }


        .btn-login:active {

            transform: translateY(0);
        }


        /* =====================================
           FOOTER
        ===================================== */

        .footer {

            text-align: center;

            margin-top: 24px;

            color: #94a3b8;

            font-size: 11px;

            line-height: 1.6;
        }


        .footer-line {

            width: 42px;

            height: 3px;

            border-radius: 10px;

            background: #2563eb;

            margin: 0 auto 9px;
        }


        /* =====================================
           MOBILE
        ===================================== */

        @media (max-width: 600px) {

            body {

                padding: 15px;
            }


            .login-card {

                padding: 30px 21px;

                border-radius: 22px;
            }


            .logo {

                width: 76px;

                height: 76px;

                border-radius: 19px;

                padding: 8px;
            }


            .title {

                font-size: 24px;
            }


            .subtitle {

                font-size: 13px;

                margin-bottom: 24px;
            }


            .form-control {

                height: 50px;
            }


            .btn-login {

                height: 50px;
            }
        }

    </style>

</head>


<body>


<div class="login-card">


    <!-- LOGO DESA KARYAMUKTI -->

    <div class="logo">

        <img
            src="{{ asset('assets/img/logo-karyamukti.png') }}"
            alt="Logo Desa Karyamukti"
        >

    </div>


    <!-- TITLE -->

    <div class="title">

        Login Admin

    </div>


    <div class="subtitle">

        Kelola data UMKM<br>

        <strong>Desa Karyamukti</strong>

    </div>


    <!-- ERROR -->

    @if(session('error'))

        <div class="alert alert-danger">

            ⚠ {{ session('error') }}

        </div>

    @endif


    <!-- SUCCESS -->

    @if(session('success'))

        <div class="alert alert-success">

            ✓ {{ session('success') }}

        </div>

    @endif


    <!-- VALIDATION -->

    @if($errors->any())

        <div class="alert alert-danger">

            ⚠ {{ $errors->first() }}

        </div>

    @endif


    <!-- LOGIN FORM -->

    <form
        action="{{ route('login.process') }}"
        method="POST"
    >

        @csrf


        <!-- USERNAME -->

        <div class="form-group">

            <label class="form-label">

                Username

            </label>


            <input
                type="text"
                name="username"
                class="form-control"
                value="{{ old('username') }}"
                placeholder="Masukkan username"
                autocomplete="username"
                required
            >

        </div>


        <!-- PASSWORD -->

        <div class="form-group">

            <label class="form-label">

                Password

            </label>


            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                autocomplete="current-password"
                required
            >

        </div>


        <!-- LOGIN -->

        <button
            type="submit"
            class="btn-login"
        >

            🔐 Masuk sebagai Admin

        </button>


    </form>


    <!-- FOOTER -->

    <div class="footer">

        <div class="footer-line"></div>

        Sistem Informasi UMKM Desa Karyamukti

    </div>


</div>


</body>

</html>