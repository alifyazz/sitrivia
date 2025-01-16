<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Mengambil pengguna yang sedang login
        $user = Auth::user();

        // Menampilkan halaman profil dengan data pengguna
        return view('profile', compact('user'));
    }
}
