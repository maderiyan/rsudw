<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
  public function login () {
    if ($user = Auth::user()) {
      if ($user->role == 'admin') {
        return redirect()->intended('dashboardadmin');
      } elseif ($user->role == 'pegawai') {
        return redirect()->intended('dashboardpegawai');
      }
    }
    return view('auth.login');
  }

  public function authlogin (Request $request) {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      $user = Auth::user();
      if ($user->role == 'admin') {
        return redirect()->intended('dashboardadmin');
      } elseif ($user->role == 'pegawai') {
        return redirect()->intended('dashboardpegawai');
      }
      return redirect()->intended('/');
    }
    return redirect('login')->withInput()->with('error', 'Email dan password tidak sesuai!');
  }

  public function logout (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('auth.login')->with('success', 'Logout berhasil!');
  }
}
