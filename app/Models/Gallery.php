<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = [
        'type_id',
        'gallery_title',
        'galery_images',
        'alt',
        'mime_type',
    ];

    protected $casts = [
        'galery_images' => 'array',
    ];

    public function gallery()
    {
        return $this->hasMany(\App\Models\GalleryType::class, 'id', 'type_id');
    }

    public function getGalleryImageLinkAttribute()
    {
        return collect($this->galery_images)->map(function ($imagePath) {
            return asset(Storage::url($imagePath));
        });
    }
}
