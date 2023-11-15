<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';

    protected $fillable = [
        'slug',
        'title',
        'short_description',
        'description',
        'cover_image',
        'inner_image',
        'inner_main_image',
        'show_in_index',
        'status',
    ];

    protected $casts = [
        'inner_image' => 'array',
    ];

    public function getUrlAttribute()
    {
        return route('service', $this->slug);
    }

    public function getImageLinkAttribute()
    {
        return asset(Storage::url($this->cover_image));
    }

    public function getInnerImageLinkAttribute()
    {
        return asset(Storage::url($this->inner_image));
    }

    public function getInnerMainImageLinkAttribute()
    {
        return asset(Storage::url($this->inner_main_image));
    }

    public function scopeShowInIndex($query)
    {
        return $query->where('show_in_index', 1);
    }

    public function scopeFilterSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
