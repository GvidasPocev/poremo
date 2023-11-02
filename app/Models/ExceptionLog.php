<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExceptionLog extends Model
{
    protected $table = 'exceptions_log';

    protected $fillable = ['message', 'file', 'line', 'user_id'];
}
