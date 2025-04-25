<?php

namespace App\Http\Controllers;

use App\Models\MasterImages;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    public function index()
    {
        $title = 'Data Master';
        return view('admin.data-master.index', compact('title'));
    }

    
}
