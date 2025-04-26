<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaTeam extends Model
{
    use HasFactory;

    protected $table = 'anggota_team';

    protected $fillable = [
        'nama',
        'posisi',
        'photo',
        'nomor_hp',
        'alamat',
        'tanggal_lahir',
        'email',
        'instagram',
        'linkedin',
        'lainnya'
    ];

    protected $dates = ['tanggal_lahir'];
}
