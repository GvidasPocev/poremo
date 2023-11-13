<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\TranslationLoader\LanguageLine;

class Language extends Model
{
    protected $table = 'language_lines';

    protected $fillable = ['key', 'text', 'group'];

    protected $casts = [
        'text' => 'array',
    ];

    protected static function booted()
    {
        static::saved(function ($item) {
            LanguageLine::find($item->id)->flushGroupCache();
        });
    }
}
