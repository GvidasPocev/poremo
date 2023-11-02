<?php

namespace App\Actions\Exception;

use App\Models\ExceptionLog;

class LogException
{
    public function log(array $input): void
    {
        $log = new ExceptionLog;
        $log->message = $input['message'] ?? null;
        $log->file = $input['file'] ?? null;
        $log->line = $input['line'] ?? null;
        $log->user_id = $input['user_id'] ?? null;
        $log->save();
    }
}
