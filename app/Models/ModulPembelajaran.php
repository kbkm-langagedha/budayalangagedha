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

    // Accessor untuk meta_keyword
    public function getMetaKeywordAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        if (is_string($value)) {
            return json_decode($value, true) ?: [];
        }

        return is_array($value) ? $value : [];
    }

    // Mutator untuk meta_keyword (saat save)
    public function setMetaKeywordAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['meta_keyword'] = json_encode($value);
        } else {
            $this->attributes['meta_keyword'] = $value;
        }
    }

    // Accessor for formatted published date
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y') : null;
    }

    // Accessor for clean description (no HTML tags)
    public function getCleanDescriptionAttribute()
    {
        return strip_tags($this->deskripsi);
    }

    // Scope for active modules
    public function scopeActive($query)
    {
        return $query->where('is_active', 'aktif');
    }

    // Scope for published modules
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    // Relationship with User (creator)
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_create');
    }
}
