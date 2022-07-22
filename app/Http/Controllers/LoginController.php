<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // Mengecek request login
        $credentials = $request->validate([
            'npm' => 'required',
            'password' => 'required'
        ]);

        // Mengecek apakah ada user dengan username dan password di tabel user
        $user = User::where('npm', $credentials['npm'])->where('password', $credentials['password'])->first();

        if ($user) {
            // Masukan data admin ke session login
            Auth::login($user, true);
            $request->session()->regenerate();

            // menuju halaman utama
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        // Lakukan logout dan hapus session login
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Kembali ke halaman utama
        return redirect('/');
    }
}
