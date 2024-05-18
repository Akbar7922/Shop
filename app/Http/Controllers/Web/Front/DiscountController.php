<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\ShopProduct;
use App\Services\DiscountService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller {
    protected $discountService;

    public function __construct(DiscountService $discountService) {
        $this->discountService = $discountService;
    }

    public function calculateDiscount(Request $request) {
        if ($this->discountService->checkExistsCode($request->code)) {
            $shopProduct = ShopProduct::findOrFail($request->shop_product_id);
            // $checkProduct = Discount::orWhere('shop_product_id', $shopProduct->id)
            //     ->orWhere('brand_id', $shopProduct->brand_id)
            //     ->orWhere('category_id', $shopProduct->product->category_id)
            //     ->get();

            // return $checkProduct;

            return $this->discountService->checkDiscountCode($request->code, $shopProduct);
        } else {
            return response()->json(['status' => 201, 'message' => 'کدتخفیف اشتباه است.']);
        }
    }

    public function checkDiscountForCart(Request $request) {
        if ($discount = $this->discountService->findWithCode($request->code)) {
            if ($this->checkActiveDiscount($discount)) {
                if ($discount->user_id == Auth::id() || ($discount->group_id > 0 && Auth::user()->groups->where('id', $discount->group_id))) {
                    if (!in_array(0, $this->updateCartWithDiscountCode($discount)))
                        return response()->json(['status' => 200  , 'message' => 'کدتخفیف باموفقیت اعمال شد']);
                    return response()->json(['status' => 201  , 'message' => 'خطا رد اعمال کدتخفیف']);
                } else
                    return response()->json(['status' => 202  , 'message' => 'کدتخفیف برای شما نمیباشد.']);
            } else
                return response()->json(['status' => 203  , 'message' => 'مدت اعتبار این کدتخفیف به پایان رسیده است']);
        } else
            return response()->json(['status' => 204  , 'message' => 'کدتخفیف اشتباه است']);
    }

    private function checkActiveDiscount($discount) {
        $now = Carbon::now()->toDateTimeString();
        return $discount->start_date <= $now && $discount->end_date > $now;
    }

    private function updateCartWithDiscountCode($discount) {
        $status = [];
        foreach (Auth::user()->carts as $item) {
            if ($item->shop_product_id == $discount->shop_product_id || $item->shopProduct->brand_id == $discount->brand_id ||
            $item->shopProduct->product->category_id == $discount->category_id || $item->shopProduct->shop_id == $discount->shop_id) {
                $item->fill(['discount_id' => $discount->id]);
                if ($item->save()) {
                    $status[] = 1;
                } else {
                    $status[] = 0;
                }
            }
        }
        return $status;
    }
}
