<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';

    protected $fillable = ['type_id', 'title', 'content', 'content_centered', 'has_map', 'map_lat', 'map_lng', 'context_us_form'];

    public function getNavigationUrlAttribute()
    {
        return $this->navigation->url;
    }

    public function type()
    {
        return $this->hasMany(\App\Models\PageType::class, 'id', 'type_id');
    }
}
