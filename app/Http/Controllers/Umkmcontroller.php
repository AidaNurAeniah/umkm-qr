<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use F9WebLtd\QrCode\Facades\QrCode;

class UmkmController extends Controller
{
    /**
     * Menampilkan semua data UMKM
     */
    public function index()
    {
        $umkms = Umkm::latest()->get();

        return view('umkm.index', compact('umkms'));
    }


    /**
     * Form tambah UMKM
     */
    public function create()
    {
        return view('umkm.create');
    }


    /**
     * Menyimpan UMKM baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm'       => 'required|string|max:255',
            'nama_pemilik'    => 'required|string|max:255',
            'whatsapp'        => 'required|string|max:30',
            'alamat'          => 'nullable|string',
            'deskripsi'       => 'nullable|string',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'instagram'       => 'nullable|string|max:255',
            'facebook'        => 'nullable|string|max:255',
            'tiktok'          => 'nullable|string|max:255',
            'produk_unggulan' => 'nullable|string',
            'maps'            => 'nullable|string|max:500',
        ]);

        $data = $request->except('foto');


        /*
        |--------------------------------------------------------------------------
        | Buat slug otomatis
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($request->nama_umkm);

        $slugAwal = $slug;
        $nomor = 1;

        while (Umkm::where('slug', $slug)->exists()) {

            $slug = $slugAwal . '-' . $nomor;

            $nomor++;
        }

        $data['slug'] = $slug;


        /*
        |--------------------------------------------------------------------------
        | Upload foto
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            $data['foto'] = $request
                ->file('foto')
                ->store('umkm', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan data
        |--------------------------------------------------------------------------
        */

        $umkm = Umkm::create($data);


        return redirect()
            ->route('umkm.show', $umkm->slug)
            ->with('success', 'Data UMKM berhasil ditambahkan.');
    }


    /**
     * Detail UMKM
     *
     * Halaman ini dibuka ketika QR Code di-scan.
     *
     * Tidak ada tombol download QR di halaman ini.
     */
    public function show($slug)
{
    $umkm = Umkm::where('slug', $slug)->firstOrFail();

    return view('umkm.show', compact('umkm'));
}


    /**
     * Form edit UMKM
     */
    public function edit($slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();

        return view('umkm.edit', compact('umkm'));
    }


    /**
     * Update UMKM
     */
    public function update(Request $request, $slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_umkm'       => 'required|string|max:255',
            'nama_pemilik'    => 'required|string|max:255',
            'whatsapp'        => 'required|string|max:30',
            'alamat'          => 'nullable|string',
            'deskripsi'       => 'nullable|string',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'instagram'       => 'nullable|string|max:255',
            'facebook'        => 'nullable|string|max:255',
            'tiktok'          => 'nullable|string|max:255',
            'produk_unggulan' => 'nullable|string',
            'maps'            => 'nullable|string|max:500',
        ]);

        $data = $request->except('foto');


        /*
        |--------------------------------------------------------------------------
        | Buat slug baru jika nama berubah
        |--------------------------------------------------------------------------
        */

        $slugBaru = Str::slug($request->nama_umkm);

        if ($slugBaru !== $umkm->slug) {

            $slugAwal = $slugBaru;
            $nomor = 1;

            while (
                Umkm::where('slug', $slugBaru)
                    ->where('id', '!=', $umkm->id)
                    ->exists()
            ) {

                $slugBaru = $slugAwal . '-' . $nomor;

                $nomor++;
            }

            $data['slug'] = $slugBaru;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload foto baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            $data['foto'] = $request
                ->file('foto')
                ->store('umkm', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update data
        |--------------------------------------------------------------------------
        */

        $umkm->update($data);


        return redirect()
            ->route('umkm.show', $umkm->slug)
            ->with('success', 'Data UMKM berhasil diperbarui.');
    }


    /**
     * Hapus UMKM
     */
    public function destroy($slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();

        $umkm->delete();

        return redirect()
            ->route('umkm.index')
            ->with('success', 'Data UMKM berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | QR CODE
    |--------------------------------------------------------------------------
    */


    /**
     * Halaman QR Code
     *
     * Dibuka dari komputer/admin.
     *
     * Menampilkan:
     * - QR Code
     * - Tombol Download
     * - Tombol Kembali
     */
    public function qrPage($slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();

        return view('umkm.qr', compact('umkm'));
    }


    /**
     * Menghasilkan GAMBAR QR CODE
     *
     * Method ini HANYA mengembalikan gambar QR.
     *
     * Jangan menggunakan:
     * return view('umkm.qr')
     * di sini.
     */
    public function qrCode($slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | URL YANG DISIMPAN DI DALAM QR
        |--------------------------------------------------------------------------
        |
        | Ketika QR di-scan HP, HP akan membuka:
        |
        | /umkm/{slug}
        |
        | sehingga masuk ke halaman detail UMKM.
        |
        */

        $url = 'http://192.168.254.223:8000/umkm/' . $umkm->slug;


        /*
        |--------------------------------------------------------------------------
        | Generate QR
        |--------------------------------------------------------------------------
        */

        $qrCode = QrCode::size(500)
            ->margin(2)
            ->generate($url);


        /*
        |--------------------------------------------------------------------------
        | Kembalikan gambar QR
        |--------------------------------------------------------------------------
        */

        return response($qrCode)
            ->header('Content-Type', 'image/svg+xml');
    }


    /**
     * Download QR Code
     */
    public function downloadQrCode($slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | URL YANG DISIMPAN DI DALAM QR
        |--------------------------------------------------------------------------
        */

        $url = 'http://192.168.254.223:8000/umkm/' . $umkm->slug;


        /*
        |--------------------------------------------------------------------------
        | Generate QR ukuran besar
        |--------------------------------------------------------------------------
        */

        $qrCode = QrCode::size(1000)
            ->margin(2)
            ->generate($url);


        /*
        |--------------------------------------------------------------------------
        | Nama file
        |--------------------------------------------------------------------------
        */

        $namaFile =
            'QR-' .
            Str::slug($umkm->nama_umkm) .
            '.svg';


        /*
        |--------------------------------------------------------------------------
        | Download
        |--------------------------------------------------------------------------
        */

        return response($qrCode)
            ->header('Content-Type', 'image/svg+xml')
            ->header(
                'Content-Disposition',
                'attachment; filename="' .
                $namaFile .
                '"'
            );
    }
}