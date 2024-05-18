<?php

namespace App\Services;

use App\Models\PayType;

class PayTypeService {
    public function getAll() {
        return PayType::all();
    }
}
