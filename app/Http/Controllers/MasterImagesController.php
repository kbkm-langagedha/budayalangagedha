<?php

namespace App\Http\Controllers;

use App\Models\MasterImages;
use Illuminate\Http\Request;

class MasterImagesController extends Controller
{
    public function index(Request $request)
    {
        $masterImages = MasterImages::all();
        return view('admin.data-master.master-images.index', compact('masterImages'));
    }

    public function show(MasterImages $masterImage)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_master_img' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
        ]);

        MasterImages::create([
            'nama_master_img' => $request->nama_master_img,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('master-images.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(MasterImages $masterImage)
    {
        return response()->json($masterImage);
    }

    public function update(Request $request, MasterImages $masterImage)
    {
        $request->validate([
            'nama_master_img' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $masterImage->update([
            'nama_master_img' => $request->nama_master_img,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('master-images.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MasterImages $masterImage)
    {
        $masterImage->delete();
        return redirect()->route('master-images.index')->with('success', 'Data berhasil dihapus.');
    }
}
