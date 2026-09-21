<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }


    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);


        $admin = Admin::where(
            'username',
            $request->username
        )->first();


        if (
            !$admin ||
            !Hash::check(
                $request->password,
                $admin->password
            )
        ) {

            return back()
                ->withInput($request->only('username'))
                ->with(
                    'error',
                    'Username atau password salah.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan login ke session
        |--------------------------------------------------------------------------
        */

        session([
            'admin_id' => $admin->id,
            'admin_nama' => $admin->nama,
            'admin_username' => $admin->username,
        ]);


        $request->session()->regenerate();


        return redirect()
            ->route('umkm.index')
            ->with(
                'success',
                'Berhasil login sebagai admin.'
            );
    }


    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->session()->forget([
            'admin_id',
            'admin_nama',
            'admin_username',
        ]);

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()
            ->route('login')
            ->with(
                'success',
                'Anda berhasil logout.'
            );
    }
}