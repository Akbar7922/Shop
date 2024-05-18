<?php

namespace App\Services;

use App\Models\SendType;

class SendTypeService {
    public function getAll() {
        return SendType::all();
    }

    public function getBasePrice($id) {
        return SendType::findOrFail($id)->base_cost;
    }
}
