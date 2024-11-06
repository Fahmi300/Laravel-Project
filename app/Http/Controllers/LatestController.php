<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatestController extends Controller
{
    public function yandex()
    {
        // Logika untuk menampilkan daftar berita
        return view('latest');
    }
}