<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function tentangDesa()
    {
        return view('frontend.tentang-desa.index');
    }
}
