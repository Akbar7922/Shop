<?php

namespace App\Services;

use App\Models\Unit;

class UnitService {
    public function all() {
        return Unit::all();
    }
}
