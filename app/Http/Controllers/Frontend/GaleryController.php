<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DataGambar;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function galeryDesa()
    {
        // Mengambil semua gambar dengan master_images id = 3
        $images = DataGambar::with('masterImages')
            ->where('id_master', 3)
            ->get();

        return view('frontend.galeri-desa.index', compact('images'));
    }
}
