<?php

namespace App\Http\Controllers;

use App\Models\MasterArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MasterArtikelController extends Controller
{
    public function index(Request $request)
    {
        $masterArtikels = MasterArtikel::all();
        return view('admin.data-master.master-artikel.index', compact('masterArtikels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_master_artikel' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
        ]);

        MasterArtikel::create($validated);

        return redirect()->route('master-artikel.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(MasterArtikel $masterArtikel)
    {
        return response()->json([
            'id' => $masterArtikel->id,
            'nama_master_artikel' => $masterArtikel->nama_master_artikel,
            'keterangan' => $masterArtikel->keterangan,
        ]);
    }

    public function update(Request $request, MasterArtikel $masterArtikel)
    {
        $validated = $request->validate([
            'nama_master_artikel' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $masterArtikel->update($validated);

        return redirect()->route('master-artikel.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MasterArtikel $masterArtikel)
    {
        $masterArtikel->delete();
        return redirect()->route('master-artikel.index')->with('success', 'Data berhasil dihapus.');
    }
}
