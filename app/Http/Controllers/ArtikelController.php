<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\MasterArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Artikel Post';

        if ($request->ajax()) {
            $artikels = Artikel::with(['kategori', 'creator'])
                ->select(['id', 'judul', 'master_artikel_id', 'is_active', 'published_at', 'view_count', 'created_by']);
            return datatables()->of($artikels)
                ->addColumn('kategori', function ($artikel) {
                    return $artikel->kategori->nama_master_artikel;
                })
                ->addColumn('author', function ($artikel) {
                    return $artikel->creator->name;
                })
                ->addColumn('status', function ($artikel) {
                    return $artikel->is_active ? 'Aktif' : 'Draft';
                })
                ->make(true);
        }

        return view('admin.data-artikel.index', compact('title'));
    }

    public function create()
    {
        $categories = MasterArtikel::all();
        return view('admin.data-artikel.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'master_artikel_id' => 'required|exists:master_artikel,id',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'meta_keywords' => 'nullable|string',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['created_by'] = Auth::id();

        if ($request->filled('meta_keywords')) {
            $keywords = array_map('trim', explode(',', $request->meta_keywords));
            $keywords = array_filter($keywords); // Remove empty values
            $data['meta_keywords'] = json_encode($keywords);
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikel-images', 'public');
        }

        Artikel::create($data);

        return redirect()->route('data-artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit(Artikel $dataArtikel)
    {
        $categories = MasterArtikel::all();

        // If meta_keywords is JSON, convert it to a comma-separated string for display
        if ($dataArtikel->meta_keywords && is_string($dataArtikel->meta_keywords)) {
            $decodedKeywords = json_decode($dataArtikel->meta_keywords, true);
            if (is_array($decodedKeywords)) {
                $dataArtikel->meta_keywords = implode(', ', $decodedKeywords);
            }
        }

        return view('admin.data-artikel.edit', compact('dataArtikel', 'categories'));
    }

    public function update(Request $request, Artikel $dataArtikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'master_artikel_id' => 'required|exists:master_artikel,id',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'meta_keywords' => 'nullable|string',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['updated_by'] = Auth::id();

        if ($request->filled('meta_keywords')) {
            $keywords = array_map('trim', explode(',', $request->meta_keywords));
            $keywords = array_filter($keywords); // Remove empty values
            $data['meta_keywords'] = json_encode($keywords);
        } else {
            $data['meta_keywords'] = null;
        }

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($dataArtikel->gambar) {
                Storage::disk('public')->delete($dataArtikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikel-images', 'public');
        }

        $dataArtikel->update($data);

        return redirect()->route('data-artikel.index')
            ->with('success', 'Artikel berhasil diupdate');
    }

    public function show(Artikel $dataArtikel)
    {
        return view('admin.data-artikel.show', compact('dataArtikel'));
    }

    public function destroy(Artikel $dataArtikel)
    {
        if ($dataArtikel->gambar) {
            Storage::disk('public')->delete($dataArtikel->gambar);
        }

        $dataArtikel->delete();

        return redirect()->route('data-artikel.index')
            ->with('success', 'Artikel berhasil dihapus');
    }
}
