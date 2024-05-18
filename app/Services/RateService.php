<?php

namespace App\Services;

use App\Models\ShopProductsRate;
use Illuminate\Database\QueryException;

class RateService {
    public function insert($data) {
        try {
            ShopProductsRate::create($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function update($data, $user_id, $shopProduct_id) {
        try {
            ShopProductsRate::whereUserId($user_id)->whereShopProductId($shopProduct_id)
                ->update($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function checkRated($user_id, $shopProduct_id) {
        // return ShopProductsRate::whereUserId($user_id)->whereShopProductId($shopProduct_id)->exists();
        return ShopProductsRate::where(['user_id' => $user_id, 'shop_product_id' => $shopProduct_id])->exists();
    }
}
