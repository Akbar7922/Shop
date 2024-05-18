<?php

namespace App\Services;

use App\Models\Installment;
use Illuminate\Database\QueryException;

class InstallmentService {
    public function create($data) {
        try {
            Installment::create($data);

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }
}
