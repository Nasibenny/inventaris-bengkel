<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menangani login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // dd('masuk',Auth::user());
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }
        // dd('gagal');
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }
}
