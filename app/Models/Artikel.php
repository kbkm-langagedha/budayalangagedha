<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'master_artikel_id',
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'gambar',
        'meta_keywords',
        'is_active',
        'published_at',
        'view_count',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'meta_keywords' => 'array',
        'is_active' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function kategori()
    {
        return $this->belongsTo(MasterArtikel::class, 'master_artikel_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
