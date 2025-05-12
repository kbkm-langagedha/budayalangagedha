<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DataGambar;
use App\Models\KalenderRitual;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        // Fetch images where id_master = 1
        $images = DataGambar::with('masterImages')
            ->where('id_master', 1)
            ->get();

        // Fetch active ritual calendar entries ordered by month and date
        $kalenderRituals = KalenderRitual::where('status', 1)
            ->orderBy('bulan')
            ->orderBy('tanggal')
            ->get();

        // Count total active rituals
        $totalRituals = $kalenderRituals->count();

        return view('frontend.welcome', compact('images', 'kalenderRituals', 'totalRituals'));
    }
}
