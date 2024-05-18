<?php

namespace App\Services;

use App\Models\Discount;
use Auth;
use Illuminate\Database\QueryException;

class DiscountService {
    public function all() {
        return Discount::paginate(20);
    }

    public function create($data) {
        try {
            Discount::create($data);

            return true;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }

    public function find($id) {
        return Discount::find($id);
    }

    public function update($id, $data) {
        try {
            Discount::where('id', $id)->update($data);

            return true;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id) {
        try {
            Discount::find($id)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function checkExistsCode($code) {
        return Discount::whereDiscountCode($code)->exists();
    }

    public function findWithCode($code) {
        return Discount::whereDiscountCode($code)->first();
    }

    public function checkExistsCodeUpdate($code, $id) {
        return Discount::whereDiscountCode($code)->whereNot('id', $id)->exists();
    }

    public function checkDiscountCode($code, $shop_product) {
        $discount = Discount::whereDiscountCode($code)->first();
        if ($discount->shop_product_id == $shop_product->id ||
            $discount->brand_id == $shop_product->brand_id ||
            $discount->shop_id == $shop_product->shop_id ||
            $discount->category_id == $shop_product->product->category_id) {
            if ($discount->user_id == Auth::id() || (($discount->group_id > 0) && (Auth::user()->groups->where('id', $discount->group_id)->count() > 0))) {
                $calculate = $this->calculate($discount, $shop_product);
                if ($calculate['status'] == 200) {
                    return response()->json(['status' => 200, 'message' => 'تخفیف باموفقیت اعمال شد', 'data' => $calculate['data'], 'discount_id' => $discount->id]);
                } else {
                    return response()->json(['status' => 201, 'message' => $calculate['message']]);
                }
            } else {
                return response()->json(['status' => 201, 'message' => 'کدتخفیف نامعتبر است']);
            }
        } else {
            return response()->json(['status' => 201, 'message' => 'کد تخفیف نامعتبر است.']);
        }
    }

    public function calculate($discount, $shopProduct) {
        if ($discount->discount_price == 0) {
            return [
                'status' => 200,
                'data' => $shopProduct->price - (($shopProduct->price * $discount->discount_percentage) / 100),
            ];
        } elseif ($shopProduct->price >= $discount->discount_price) {
            return [
                'status' => 200,
                'data' => $shopProduct->price - $discount->discount_price,
            ];
        } else {
            return ['status' => 201, 'message' => 'مقدار تخفیف نامعتبر است'];
        }
    }
}
