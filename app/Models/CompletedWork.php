<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedWork extends Model
{
    protected $table = 'completed_works';

    protected $fillable = ['structure_name', 'client', 'tasks_completed', 'started', 'finished', 'cover_image', 'inner_image', 'inner_main_image', 'status'];

    protected $casts = [
        'inner_image' => 'array',
    ];
}
