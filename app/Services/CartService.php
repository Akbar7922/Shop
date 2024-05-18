<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\ShopProduct;
use Auth;
use Illuminate\Database\QueryException;

class CartService {
    public function getUserCart($user_id) {
        return Cart::where('user_id', $user_id)->get();
    }

    public function deleteUserCart($user_id) {
        try {
            Cart::where('user_id', $user_id)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function create($data) {
        try {
            Cart::create($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function update($id, $data) {
        try {
            Cart::findOrFail($id)->update($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function deleteCartItem($id) {
        try {
            Cart::findOrFail($id)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function checkExists($user_id, $shop_product_id) {
        return Cart::where(['user_id' => $user_id, 'shop_product_id' => $shop_product_id])
            ->exists();
    }

    public function checkExistsProduct($shop_product_id) {
        return ShopProduct::where('id', $shop_product_id)->first('count')->count;
    }

    public function getMyShoppingCartTotal() {
        $total_price = 0;
        foreach (Auth::user()->carts as $cart) {
            $total_price += $cart->total();
        }

        return $total_price;
    }

    public function getShops() {
        $shops = [];
        foreach (Auth::user()->carts as $cart) {
            if (! in_array($cart->shopProduct->shop_id, $shops)) {
                $shops[] = $cart->shopProduct->shop_id;
            }
        }

        return $shops;
    }

    public function getShopPrice($shop_id) {
        $total_price = 0;
        foreach (Auth::user()->carts as $cart) {
            if ($cart->shopProduct->shop_id == $shop_id) {
                $total_price += $cart->total();
            }
        }

        return $total_price;
    }
}
