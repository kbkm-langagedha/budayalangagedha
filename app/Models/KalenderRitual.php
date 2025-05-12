<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderRitual extends Model
{
    use HasFactory;

    protected $table = 'kalender_ritual';

    protected $fillable = [
        'nama_ritual',
        'deskripsi',
        'tanggal',
        'bulan',
        'lokasi',
        'keterangan',
        'gambar',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Method untuk mendapatkan bulan dalam format teks
    public function getBulanTextAttribute()
    {
        $bulanArray = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $bulanArray[$this->bulan] ?? '';
    }

    // Method untuk mendapatkan inisial bulan (3 huruf)
    public function getInisialBulanAttribute()
    {
        $bulanArray = [
            1 => 'JAN',
            2 => 'FEB',
            3 => 'MAR',
            4 => 'APR',
            5 => 'MEI',
            6 => 'JUN',
            7 => 'JUL',
            8 => 'AGT',
            9 => 'SEP',
            10 => 'OKT',
            11 => 'NOV',
            12 => 'DES'
        ];

        return $bulanArray[$this->bulan] ?? '';
    }

    public function getTanggalLengkapAttribute()
    {
        return $this->tanggal . ' ' . $this->bulan_text;
    }
}
