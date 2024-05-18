<?php

namespace App\Services;

use App\Models\ShopOrderProduct;
use Illuminate\Database\QueryException;

class ShopOrderProductService {
    public function create($data) {
        try {
            ShopOrderProduct::create($data);

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }
}
