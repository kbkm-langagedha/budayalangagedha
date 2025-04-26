<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'modul_pembelajaran';
    protected $fillable = [
        'title',
        'deskripsi',
        'thumbnail',
        'video_path',
        'url_video',
        'is_active',
        'user_create',
        'slug',
        'view',
        'published_at',
        'duration',
        'meta_keyword'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_create');
    }
}
