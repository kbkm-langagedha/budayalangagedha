<?php

namespace App\Http\Controllers;

use App\Models\KalenderRitual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KalenderRitualController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KalenderRitual::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status_badge', function ($row) {
                    if ($row->status) {
                        return '<span class="badge bg-success">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Nonaktif</span>';
                    }
                })
                ->addColumn('tanggal_lengkap', function ($row) {
                    return $row->tanggal . ' ' . $row->bulan_text;
                })
                ->addColumn('gambar', function ($row) {
                    if ($row->gambar) {
                        return '<img src="' . asset('storage/ritual/' . $row->gambar) . '" class="img-thumbnail" width="100">';
                    } else {
                        return '<span class="badge bg-secondary">Tidak ada gambar</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex">';

                    if (auth()->user()->can('update admin/kalender-ritual')) {
                        $btn .= '<a href="' . route('kalender-ritual.edit', $row->id) . '" class="btn btn-primary btn-sm me-1"><i class="ti-pencil"></i></a>';
                    }

                    if (auth()->user()->can('delete admin/kalender-ritual')) {
                        $btn .= '<button type="button" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteKalenderRitual"><i class="ti-trash"></i></button>';
                    }

                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action', 'status_badge', 'gambar'])
                ->make(true);
        }

        $data = [
            'title' => 'Kalender Ritual Tahunan',
            'breadcrumb' => [
                ['title' => 'Dashboard', 'url' => route('dashboard')],
                ['title' => 'Kalender Ritual', 'url' => '#']
            ],
        ];

        return view('admin.kalender-ritual.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kalender Ritual',
            'breadcrumb' => [
                ['title' => 'Dashboard', 'url' => route('dashboard')],
                ['title' => 'Kalender Ritual', 'url' => route('kalender-ritual.index')],
                ['title' => 'Tambah', 'url' => '#']
            ],
        ];

        return view('admin.kalender-ritual.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_ritual' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|integer|min:1|max:31',
            'bulan' => 'required|integer|min:1|max:12',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/ritual', $gambarName);
            $data['gambar'] = $gambarName;
        }

        KalenderRitual::create($data);

        return redirect()->route('kalender-ritual.index')
            ->with('success', 'Kalender Ritual berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ritual = KalenderRitual::findOrFail($id);

        $data = [
            'title' => 'Edit Kalender Ritual',
            'breadcrumb' => [
                ['title' => 'Dashboard', 'url' => route('dashboard')],
                ['title' => 'Kalender Ritual', 'url' => route('kalender-ritual.index')],
                ['title' => 'Edit', 'url' => '#']
            ],
            'ritual' => $ritual
        ];

        return view('admin.kalender-ritual.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_ritual' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|integer|min:1|max:31',
            'bulan' => 'required|integer|min:1|max:12',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'nullable',
            'hapus_gambar' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ritual = KalenderRitual::findOrFail($id);

        $data = $request->all();
        $data['status'] = $request->has('status') ? 1 : 0;

        // Handle gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($ritual->gambar) {
                Storage::delete('public/ritual/' . $ritual->gambar);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/ritual', $gambarName);
            $data['gambar'] = $gambarName;
        } elseif ($request->has('hapus_gambar')) {
            // Hapus gambar tanpa mengganti
            if ($ritual->gambar) {
                Storage::delete('public/ritual/' . $ritual->gambar);
            }
            $data['gambar'] = null;
        } else {
            // Tetap menggunakan gambar yang ada
            unset($data['gambar']);
        }

        $ritual->update($data);

        return redirect()->route('kalender-ritual.index')
            ->with('success', 'Kalender Ritual berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $ritual = KalenderRitual::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($ritual->gambar) {
            Storage::delete('public/ritual/' . $ritual->gambar);
        }

        $ritual->delete();

        return response()->json([
            'status' => true,
            'message' => 'Kalender Ritual berhasil dihapus!'
        ]);
    }
}
