<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterArtikel extends Model
{
    use HasFactory;

    protected $table = 'master_artikel';
    protected $fillable = ['nama_master_artikel', 'keterangan'];
}
