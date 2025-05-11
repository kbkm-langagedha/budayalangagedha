<?php

namespace App\Http\Controllers;

use App\Models\AnggotaTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AnggotaTeamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AnggotaTeam::query();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    if ($row->photo) {
                        return '<img src="' . asset('storage/' . $row->photo) . '" width="50" class="img-thumbnail" alt="Team Photo">';
                    }
                    return '<span class="badge bg-secondary">No Photo</span>';
                })
                ->addColumn('tanggal_lahir', function ($row) {
                    if ($row->tanggal_lahir) {
                        return \Carbon\Carbon::parse($row->tanggal_lahir)->format('d/m/Y');
                    }
                    return '-';
                })
                ->addColumn('social_media', function ($row) {
                    $social = '';
                    if ($row->instagram) {
                        $social .= '<a href="' . $row->instagram . '" target="_blank" class="me-2">';
                        $social .= '<i class="fab fa-instagram fa-lg text-danger"></i>';
                        $social .= '</a>';
                    }

                    if ($row->linkedin) {
                        $social .= '<a href="' . $row->linkedin . '" target="_blank">';
                        $social .= '<i class="fab fa-linkedin fa-lg text-primary"></i>';
                        $social .= '</a>';
                    }

                    if (!$row->instagram && !$row->linkedin) {
                        $social = '-';
                    }

                    return $social;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex">';
                    $btn .= '<a href="' . route('anggota-team.edit', $row->id) . '" class="btn btn-primary btn-sm me-1"><i class="ti-pencil"></i></a>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteAnggota"><i class="ti-trash"></i></button>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['photo', 'social_media', 'action'])
                ->make(true);
        }

        $data = [
            'title' => 'Anggota Team',
            'breadcrumb' => [
                ['title' => 'Dashboard', 'url' => route('dashboard')],
                ['title' => 'Anggota Team', 'url' => '#']
            ],
        ];

        return view('admin.anggota-team.index', $data);
    }

    public function create()
    {
        return view('admin.anggota-team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nomor_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'lainnya' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team-photos', 'public');
        }

        AnggotaTeam::create($validated);

        return redirect()->route('anggota-team.index')->with('success', 'Anggota team created successfully.');
    }

    public function edit(AnggotaTeam $anggotaTeam)
    {
        return view('admin.anggota-team.edit', compact('anggotaTeam'));
    }

    public function update(Request $request, AnggotaTeam $anggotaTeam)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nomor_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'lainnya' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($anggotaTeam->photo) {
                Storage::disk('public')->delete($anggotaTeam->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team-photos', 'public');
        }

        $anggotaTeam->update($validated);

        return redirect()->route('anggota-team.index')->with('success', 'Anggota team updated successfully.');
    }

    public function destroy(AnggotaTeam $anggotaTeam)
    {
        if ($anggotaTeam->photo) {
            Storage::disk('public')->delete($anggotaTeam->photo);
        }
        $anggotaTeam->delete();

        return redirect()->route('anggota-team.index')->with('success', 'Anggota team deleted successfully.');
    }
}
