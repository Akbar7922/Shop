<?php

namespace App\Services;

use App\Models\ShopOrder;
use Illuminate\Database\QueryException;

class ShopOrderService {
    public function create($data) {
        try {
            return ShopOrder::create($data);
        } catch (QueryException $queryException) {
            return false;
        }
    }

    public function getShopOrdersIDFromOrders($order_ids) {
        return ShopOrder::whereIn('order_id', $order_ids)->pluck('id');
    }
}
