<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DataGambar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        // Fetch images where id_master = 1
        $images = DataGambar::with('masterImages')
            ->where('id_master', 1)
            ->get();

        return view('frontend.welcome', compact('images'));
    }
}
