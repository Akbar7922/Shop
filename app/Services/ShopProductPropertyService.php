<?php

namespace App\Services;

use App\Models\ShopProductProperty;

class ShopProductPropertyService {
    public function getProductProperties($shop_product_id) {
        return ShopProductProperty::where('shop_product_id', $shop_product_id)->get();
    }
}
