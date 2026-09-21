<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah UMKM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background:
            radial-gradient(circle at top left, rgba(56, 189, 248, 0.18), transparent 35%),
            radial-gradient(circle at bottom right, rgba(37, 99, 235, 0.12), transparent 35%),
            #eff6ff;
        color: #1e293b;
        min-height: 100vh;
    }

    .container-form {
        max-width: 850px;
        margin: 45px auto;
        padding: 0 15px;
    }

    .card-form {
        background: #ffffff;
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(30, 58, 138, 0.12);
    }

    .card-header-custom {
        position: relative;
        padding: 32px;
        color: white;
        background: linear-gradient(
            135deg,
            #1e3a8a 0%,
            #2563eb 55%,
            #38bdf8 100%
        );
        overflow: hidden;
    }

    .card-header-custom::before {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.10);
        right: -50px;
        top: -80px;
    }

    .card-header-custom::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        right: 130px;
        bottom: -50px;
    }

    .header-icon {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .card-header-custom h4 {
        font-weight: 750;
        margin-bottom: 5px;
        position: relative;
        z-index: 2;
    }

    .card-header-custom small {
        opacity: 0.92;
        position: relative;
        z-index: 2;
    }

    .card-body-custom {
        padding: 35px;
    }

    .section-title {
        font-size: 15px;
        font-weight: 750;
        color: #1e3a8a;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .section-title::before {
        content: "";
        width: 5px;
        height: 23px;
        border-radius: 5px;
        background: linear-gradient(
            #1e3a8a,
            #2563eb,
            #38bdf8
        );
    }

    .form-label {
        font-weight: 650;
        color: #334155;
        margin-bottom: 8px;
    }

    .form-control {
        border: 1px solid #dbeafe;
        border-radius: 12px;
        padding: 12px 14px;
        transition: 0.2s;
        color: #1e293b;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    textarea.form-control {
        resize: vertical;
    }

    .help-text {
        font-size: 12px;
        color: #64748b;
        margin-top: 7px;
    }

    .upload-box {
        padding: 5px;
        border-radius: 14px;
        background: linear-gradient(
            135deg,
            rgba(37, 99, 235, 0.08),
            rgba(56, 189, 248, 0.12)
        );
    }

    .alert-danger {
        border: none;
        border-left: 5px solid #ef4444;
        border-radius: 12px;
    }

    .button-area {
        border-top: 1px solid #e2e8f0;
        margin-top: 30px;
        padding-top: 25px;
    }

    .btn-back {
        background: #f1f5f9;
        color: #475569;
        border: none;
        padding: 11px 22px;
        border-radius: 12px;
        font-weight: 650;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
        transform: translateY(-1px);
    }

    .btn-save {
        border: none;
        padding: 11px 25px;
        border-radius: 12px;
        font-weight: 750;
        color: white;
        background: linear-gradient(
            135deg,
            #1e3a8a,
            #2563eb
        );
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        transition: 0.2s;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(37, 99, 235, 0.32);
        color: white;
    }

    @media (max-width: 600px) {
        .container-form {
            margin: 20px auto;
        }

        .card-header-custom,
        .card-body-custom {
            padding: 25px 20px;
        }

        .button-area {
            flex-direction: column;
            gap: 12px;
        }

        .btn-back,
        .btn-save {
            width: 100%;
            text-align: center;
        }
    }
</style>

</head>

<body>

<div class="container-form">

<div class="card-form">

    <div class="card-header-custom">

        <div class="header-icon">
            🏪
        </div>

        <h4>Tambah Data UMKM</h4>

        <small>
            Lengkapi informasi usaha untuk ditampilkan pada katalog UMKM.
        </small>

    </div>

    <div class="card-body-custom">

        @if ($errors->any())

            <div class="alert alert-danger mb-4">

                <strong>Terjadi kesalahan!</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form action="{{ route('umkm.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="section-title">
                Informasi Utama
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label for="nama_umkm" class="form-label">
                        Nama UMKM
                    </label>

                    <input
                        type="text"
                        name="nama_umkm"
                        id="nama_umkm"
                        class="form-control"
                        value="{{ old('nama_umkm') }}"
                        placeholder="Contoh: Kedai Mardira"
                        required
                    >

                </div>

                <div class="col-md-6 mb-3">

                    <label for="nama_pemilik" class="form-label">
                        Nama Pemilik
                    </label>

                    <input
                        type="text"
                        name="nama_pemilik"
                        id="nama_pemilik"
                        class="form-control"
                        value="{{ old('nama_pemilik') }}"
                        placeholder="Masukkan nama pemilik"
                        required
                    >

                </div>

            </div>

            <div class="mb-3">

                <label for="whatsapp" class="form-label">
                    Nomor WhatsApp
                </label>

                <input
                    type="text"
                    name="whatsapp"
                    id="whatsapp"
                    class="form-control"
                    value="{{ old('whatsapp') }}"
                    placeholder="Contoh: 081234567890"
                    required
                >

                <div class="help-text">
                    Gunakan nomor WhatsApp yang aktif agar pelanggan dapat menghubungi UMKM.
                </div>

            </div>

            <div class="mb-4">

                <label for="alamat" class="form-label">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    id="alamat"
                    rows="3"
                    class="form-control"
                    placeholder="Masukkan alamat lengkap UMKM"
                    required
                >{{ old('alamat') }}</textarea>

            </div>

            <div class="section-title">
                Profil dan Foto
            </div>

            <div class="mb-3">

                <label for="foto" class="form-label">
                    Foto UMKM
                </label>

                <div class="upload-box">

                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control"
                        accept=".jpg,.jpeg,.png"
                    >

                </div>

                <div class="help-text">
                    Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                </div>

            </div>

            <div class="mb-3">

                <label for="deskripsi" class="form-label">
                    Deskripsi UMKM
                </label>

                <textarea
                    name="deskripsi"
                    id="deskripsi"
                    rows="5"
                    class="form-control"
                    placeholder="Ceritakan secara singkat tentang UMKM..."
                >{{ old('deskripsi') }}</textarea>

            </div>

            <div class="button-area d-flex justify-content-between align-items-center">

                <a href="{{ route('umkm.index') }}"
                   class="btn-back">
                    ← Kembali
                </a>

                <button type="submit"
                        class="btn-save">
                    Simpan UMKM
                </button>

            </div>

        </form>

    </div>

</div>

</div>

</body>
</html>
