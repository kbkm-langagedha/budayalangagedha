<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected $dates = [
        'published_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'meta_keywords' => 'json'
    ];

    // Relationship with category
    public function kategori()
    {
        return $this->belongsTo(MasterArtikel::class, 'master_artikel_id');
    }

    // Relationship with creator
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with updater
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Scope for active articles
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for published articles
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    // Increment view count
    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    // Get excerpt
    public function getExcerpt($limit = 150)
    {
        return Str::limit($this->ringkasan ?: strip_tags($this->konten), $limit);
    }
}
