<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterImages extends Model
{
    use HasFactory;

    protected $table = 'master_images';
    protected $fillable = ['nama_master_img', 'keterangan'];

    public function dataGambar()
    {
        return $this->hasMany(DataGambar::class, 'id_master');
    }

}
