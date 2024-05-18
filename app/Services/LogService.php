<?php

namespace App\Services;

use App\Models\Log;
use Illuminate\Database\QueryException;

class LogService {
    public function create($data) {
        try {
            Log::create($data);

            return true;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }
}
