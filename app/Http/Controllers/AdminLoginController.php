<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // Mengecek request login
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        // Mengecek apakah ada admin dengan username dan password di tabel admin
        $admin = Admin::where('username', $credentials['username'])->where('password', $credentials['password'])->first();

        if ($admin) {
            // Masukan data admin ke session login
            Auth::login($admin, true);
            $request->session()->regenerate();

            // menuju halaman utama admin
            return redirect()->intended('admin/dashboard');
        }

        // Apabila login mengalami error
        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        // Lakukan logout dan hapus session login
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Kembali ke halaman utama
        return redirect(route('admin.login'));
    }
}
