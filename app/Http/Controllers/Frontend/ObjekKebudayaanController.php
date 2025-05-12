<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObjekKebudayaanController extends Controller
{
    public function objekBudaya()
    {
        return view('frontend.objek-budaya.index');
    }
}
