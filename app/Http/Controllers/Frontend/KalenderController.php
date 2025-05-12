<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KalenderRitual;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function kalender()
    {
        // Ambil hanya kalender yang aktif dan group by bulan
        $kalender = KalenderRitual::where('status', 1)
            ->get()
            ->groupBy('bulan');

        // Hitung jumlah kegiatan per bulan dan urutkan
        $kalenderPerBulan = [];
        foreach ($kalender as $bulan => $rituals) {
            $kalenderPerBulan[$bulan] = [
                'count' => $rituals->count(),
                'rituals' => $rituals->sortBy('tanggal')
            ];
        }

        // Urutkan berdasarkan bulan
        ksort($kalenderPerBulan);

        // Ambil data bulan pertama untuk ditampilkan
        $firstMonth = null;
        $firstMonthData = collect();
        if (!empty($kalenderPerBulan)) {
            $firstMonth = array_key_first($kalenderPerBulan);
            $firstMonthData = $kalenderPerBulan[$firstMonth]['rituals'];
        }

        return view('frontend.kalender-ritual.index', compact('kalenderPerBulan', 'firstMonth', 'firstMonthData'));
    }

    // Method untuk mendapatkan data ritual per bulan via AJAX
    public function getRitualsByMonth($bulan)
    {
        try {
            $rituals = KalenderRitual::where('status', 1)
                ->where('bulan', $bulan)
                ->orderBy('tanggal')
                ->get();

            // Pastikan bulan_text diakses dengan benar
            $rituals->each(function ($ritual) {
                $ritual->bulan_text = $ritual->getBulanTextAttribute();
            });

            return response()->json([
                'status' => 'success',
                'rituals' => $rituals,
                'message' => 'Data berhasil dimuat'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memuat data: ' . $e->getMessage()
            ], 500);
        }
    }
}
