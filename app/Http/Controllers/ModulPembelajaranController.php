<?php

namespace App\Http\Controllers;

use App\Models\ModulPembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModulPembelajaranController extends Controller
{
    public function index()
    {
        $moduls = ModulPembelajaran::latest()->get();
        return view('admin.modul-pembelajaran.index', compact('moduls'));
    }

    public function create()
    {
        return view('admin.modul-pembelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_path' => 'nullable|file|mimes:mp4,avi,mov|max:10240',
            'url_video' => 'nullable|url',
            'is_active' => 'required|in:aktif,tidak_aktif,draft',
            'published_at' => 'nullable|date',
            'duration' => 'nullable|string|max:50',
            'meta_keyword' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['user_create'] = Auth::id();
        $data['slug'] = Str::slug($request->title);

        // Process meta keywords into JSON
        if ($request->filled('meta_keyword')) {
            $keywords = array_map('trim', explode(',', $request->meta_keyword));
            $data['meta_keyword'] = json_encode(array_filter($keywords));
        } else {
            $data['meta_keyword'] = json_encode([]);
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('video_path')) {
            $data['video_path'] = $request->file('video_path')->store('videos', 'public');
        }

        ModulPembelajaran::create($data);

        return redirect()->route('modul-pembelajaran.index')->with('success', 'Modul berhasil ditambahkan.');
    }

    public function show(ModulPembelajaran $modulPembelajaran)
    {
        return view('admin.modul-pembelajaran.show', compact('modulPembelajaran'));
    }

    public function edit(ModulPembelajaran $modulPembelajaran)
    {
        return view('admin.modul-pembelajaran.edit', compact('modulPembelajaran'));
    }

    public function update(Request $request, ModulPembelajaran $modulPembelajaran)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_path' => 'nullable|file|mimes:mp4,avi,mov|max:10240',
            'url_video' => 'nullable|url',
            'is_active' => 'required|in:aktif,tidak_aktif,draft',
            'published_at' => 'nullable|date',
            'duration' => 'nullable|string|max:50',
            'meta_keyword' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Process meta keywords into JSON
        if ($request->filled('meta_keyword')) {
            $keywords = array_map('trim', explode(',', $request->meta_keyword));
            $data['meta_keyword'] = json_encode(array_filter($keywords));
        } else {
            $data['meta_keyword'] = json_encode([]);
        }

        if ($request->hasFile('thumbnail')) {
            if ($modulPembelajaran->thumbnail) {
                Storage::disk('public')->delete($modulPembelajaran->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } elseif ($request->has('remove_thumbnail') && $modulPembelajaran->thumbnail) {
            Storage::disk('public')->delete($modulPembelajaran->thumbnail);
            $data['thumbnail'] = null;
        }

        if ($request->hasFile('video_path')) {
            if ($modulPembelajaran->video_path) {
                Storage::disk('public')->delete($modulPembelajaran->video_path);
            }
            $data['video_path'] = $request->file('video_path')->store('videos', 'public');
        } elseif ($request->has('remove_video') && $modulPembelajaran->video_path) {
            Storage::disk('public')->delete($modulPembelajaran->video_path);
            $data['video_path'] = null;
        }

        $modulPembelajaran->update($data);

        return redirect()->route('modul-pembelajaran.index')->with('success', 'Modul berhasil diperbarui.');
    }

    public function destroy(ModulPembelajaran $modulPembelajaran)
    {
        if ($modulPembelajaran->thumbnail) {
            Storage::disk('public')->delete($modulPembelajaran->thumbnail);
        }
        if ($modulPembelajaran->video_path) {
            Storage::disk('public')->delete($modulPembelajaran->video_path);
        }

        $modulPembelajaran->delete();

        return redirect()->route('modul-pembelajaran.index')->with('success', 'Modul berhasil dihapus.');
    }


    public function activate(ModulPembelajaran $modulPembelajaran)
    {
        // Set the module to active status
        $modulPembelajaran->update([
            'is_active' => 'aktif',
            // If no published date is set, set it to now
            'published_at' => $modulPembelajaran->published_at ?? now()
        ]);

        return redirect()->back()->with('success', 'Modul berhasil diaktifkan.');
    }

    /**
     * Deactivate a module
     */
    public function deactivate(ModulPembelajaran $modulPembelajaran)
    {
        // Set the module to inactive status
        $modulPembelajaran->update([
            'is_active' => 'tidak_aktif'
        ]);

        return redirect()->back()->with('success', 'Modul berhasil dinonaktifkan.');
    }

}
