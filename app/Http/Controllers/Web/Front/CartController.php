<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\CityService;
use App\Services\PayTypeService;
use App\Services\SendTypeService;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller {
    protected $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index() {
        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();
        $cart = Auth::user()->carts;

        return view('frontend.web.cart', compact(['cart', 'categories']));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

    public function addToCart(Request $request) {
        if ($this->cartService->checkExistsProduct($request->shop_product_id) >= $request->count) {
            if ($this->cartService->checkExists(Auth::id(), $request->shop_product_id)) {
                return response()->json(['status' => 202, 'message' => 'کالا قبلا به سبد خرید افزوده شده است.']);
            }

            $request->request->add(['user_id' => Auth::id(), 'discount_id' => $request->discount_id, 'register_user_id' => Auth::id()]);
            if ($this->cartService->create($request->all())) {
                return response()->json(['status' => 200, 'message' => 'کالا باموفقیت به سبد خرید افزوده شد.']);
            }

            return response()->json(['status' => 201, 'message' => 'خطا در انجام عملیات ، مجددا تلاش کنید.']);
        } else {
            return response()->json(['status' => 203, 'message' => 'این کالا موجود نمیباشد']);
        }
    }

    public function deleteFromCart(Request $request) {
        if ($this->cartService->deleteCartItem($request->cart_id)) {
            return response()->json(['status' => 200, 'message' => 'کالا باموفقیت از سبد خرید حذف شد.']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در انجام عملیات ، مجددا تلاش کنید.']);
    }

    public function submitCart(Request $request) {
        $data = json_decode($request->data);
        if (count($data) > 0) {
            foreach ($data as $item) {
                $this->cartService->update($item->id, ['count' => $item->count]);
            }
        }

        return redirect(route('checkout'));
    }

    public function checkout() {
        $categoryService = new CategoryService();
        $payTypeService = new PayTypeService();
        $sendTypeService = new SendTypeService();
        $cityService = new CityService();
        $categories = $categoryService->mainCategories();
        $pay_types = $payTypeService->getAll();
        $send_types = $sendTypeService->getAll();
        $totals = $this->getUserCartPrice();
        $total_cart_price = $totals['total_price'];
        $states = $cityService->getStates();
        $isInstallment = false;
        $installmentsCount = 2;
        $installments = 0;
        $cashPayment = 0;
        $tonnage = $totals['tonnage'];
        if (Auth::user()->groups()->where('group_id', 1)->exists()) {
            $isInstallment = true;
            $cashPayment = $total_cart_price / 2;
            $installments = $this->installmentsData($tonnage, $cashPayment);
        }

        return view('frontend.web.checkout', compact(['categories', 'pay_types',
            'send_types', 'total_cart_price', 'states', 'tonnage', 'isInstallment', 'installments', 'cashPayment']));
    }

    private function installmentsData($tonnage, $price) {
        $installments = $this->calculateInstallments($tonnage, $price);

        return [
            'installment' => $installments,
            'first_installment' => verta()->addMonths(1)->formatJalaliDate(),
            'latest_installment' => verta()->addMonths(2)->formatJalaliDate(),
        ];
    }

    public static function calculateInstallments($tonnage, $price) {
        switch ($tonnage) {
            case $tonnage >= 1000:
                return ($price / 2) + ($price * 1.5) / 100;
            case $tonnage >= 500 & $tonnage < 1000:
                return ($price / 2) + ($price * 2) / 100;
            case $tonnage >= 100 && $tonnage < 500:
                return ($price / 2) + ($price * 2.5) / 100;
            case $tonnage < 100:
                return ($price / 2) + ($price * 3) / 100;
            default:
                return -1;
        }
    }

    public static function getUserCartPrice() {
        $total_price = 0;
        $tonnage = 0;
        foreach (Auth::user()->carts as $cart) {
            $total_price += $cart->total();
            if ($cart->shopProduct->unit_id == 1) {
                $tonnage += $cart->count * 10;
            } elseif ($cart->shopProduct->unit_id == 4) {
                $tonnage += $cart->count * 20;
            }
        }

        $res = [
            'total_price' => $total_price,
            'tonnage' => $tonnage,
        ];

        return $res;
    }
}
