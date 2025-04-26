<?php

namespace App\Http\Controllers;

use App\Models\DataGambar;
use App\Models\MasterImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataGambarController extends Controller
{
    public function index(Request $request)
    {
        $masterImages = MasterImages::all();
        $id_master = $request->get('id_master');

        $images = DataGambar::with('masterImages')
            ->when($id_master, function ($query, $id_master) {
                return $query->where('id_master', $id_master);
            })
            ->get();
        return view('admin.data-gambar.index', compact('images', 'masterImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'id_master' => 'required|exists:master_images,id',
        ]);

        // Upload file
        $path = $request->file('image')->store('images', 'public');

        DataGambar::create([
            'title' => $request->title,
            'image' => $path,
            'id_master' => $request->id_master,
        ]);

        return redirect()->route('data-gambar.index')->with('success', 'Image berhasil ditambahkan.');
    }


    public function edit(DataGambar $image)
    {
        return response()->json($image);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'id_master' => 'required|exists:master_images,id',
        ]);

        $image = DataGambar::findOrFail($id);

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $image->image = $path;
        }

        $image->title = $request->title;
        $image->id_master = $request->id_master;
        $image->save();

        return redirect()
            ->route('data-gambar.index')
            ->with('success', 'Image berhasil diperbarui.');
    }

    public function destroy(DataGambar $image)
    {
        try {
            // 1. Simpan path gambar dulu
            $imagePath = $image->image;

            // 2. Hapus record dari database dulu
            $image->delete();

            // 3. Hapus file fisiknya jika ada
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            return redirect()
                ->route('data-gambar.index')
                ->with('success', 'Image berhasil dihapus.');
        } catch (\Exception $e) {
            // Tampilkan error untuk debugging
            return redirect()
                ->route('data-gambar.index')
                ->with('error', 'Gagal menghapus image: ' . $e->getMessage());
        }
    }

}
