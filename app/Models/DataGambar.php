<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGambar extends Model
{
    use HasFactory;

    protected $table = 'data_gambar';
    protected $fillable = [
        'title',
        'image',
        'id_master'
    ];

    public function masterImages()
    {
        return $this->belongsTo(MasterImages::class, 'id_master');
    }
}
