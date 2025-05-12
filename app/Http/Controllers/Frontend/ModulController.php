<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ModulPembelajaran;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function modul()
    {
        // Ambil hanya modul yang aktif dan sudah dipublish
        $moduls = ModulPembelajaran::where('is_active', 'aktif')
            ->whereNotNull('published_at')
            ->latest()
            ->get();

        return view('frontend.modul.index', compact('moduls'));
    }

    public function incrementView($id)
    {
        $modul = ModulPembelajaran::findOrFail($id);
        $modul->increment('view');

        return response()->json(['success' => true]);
    }
}
