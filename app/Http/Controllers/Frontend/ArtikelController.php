<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\MasterArtikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function artikel(Request $request)
    {
        $artikels = Artikel::with(['kategori'])
            ->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(6);

        return view('frontend.artikel.index', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::with(['kategori'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        $recentPosts = Artikel::with(['kategori'])
            ->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $artikel->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        // Ambil semua kategori
        $categories = MasterArtikel::select('id', 'nama_master_artikel')->get();

        return view('frontend.artikel.show', compact('artikel', 'recentPosts', 'categories'));
    }
}