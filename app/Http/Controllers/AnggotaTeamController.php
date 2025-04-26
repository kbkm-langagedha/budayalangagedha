<?php

namespace App\Http\Controllers;

use App\Models\AnggotaTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaTeamController extends Controller
{
    public function index()
    {
        $anggotaTeams = AnggotaTeam::all();
        return view('admin.anggota-team.index', compact('anggotaTeams'));
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
