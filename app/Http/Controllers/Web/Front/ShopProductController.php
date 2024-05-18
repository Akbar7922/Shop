<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Models\ShopOrderProduct;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\LogService;
use App\Services\RateService;
use App\Services\ShopOrderService;
use App\Services\ShopProductService;
use Auth;
use Illuminate\Http\Request;
use Validator;

class ShopProductController extends Controller {
    protected $shopProductService;

    protected $logService;

    public function __construct(ShopProductService $shopProductService,
        LogService $logService) {
        $this->shopProductService = $shopProductService;
        $this->logService = $logService;
    }

    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($slug) {
        $discount = null;
        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();
        $product = $this->shopProductService->findWithSlug($slug);
        $similarProducts = $this->shopProductService->similarProduct($product->product->category_id);
        $otherHaveBoughtProducts = $this->shopProductService->latestProducts();
        $logData = [
            'activity_id' => 5,
            'entity_id' => $product->id,
            'ip_address' => request()->ip(),
            'platform' => 0,
            'user_id' => 0,
        ];
        if (Auth::check()) {
            $logData['user_id'] = Auth::id();
            $discount = Auth::user()->discounts()->where('shop_product_id', $product->id);
        }

        $this->logService->create($logData);

        return view('frontend.web.product', compact(['product',
            'similarProducts', 'otherHaveBoughtProducts', 'categories', 'discount']));
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

    public function productsFromSerach(Request $request) {
        $products = $this->shopProductService->productsFromSearch(
            $request->category_id, $request->brand_id);

        return view('frontend.partial.product_item', compact(['products']));
    }

    public function rate(Request $requset) {
        $validator = Validator::make($requset->all(), [
            'shop_product_id' => 'required|integer',
            'rate' => 'required|numeric',
            'comment' => 'string|nullable',
        ]);

        if ($validator->errors()->count() > 0) {
            return $validator->errors();
        }
        $rateService = new RateService();
        if ($this->checkSale($requset->shop_product_id)) {
            if (! $rateService->checkRated(Auth::id(), $requset->shop_product_id)) {
                $requset->request->add(['user_id' => Auth::id()]);
                if ($rateService->insert($requset->all())) {
                    return response()->json(['status' => 200, 'message' => 'امتیاز باموفقیت ثبت شد.']);
                }

                return response()->json(['status' => 201, 'message' => 'خطا در ثبت امتیاز.']);
            } else {
                if ($rateService->update($requset->all(), Auth::id(), $requset->shop_product_id)) {
                    return response()->json(['status' => 200, 'message' => 'امتیاز باموفقیت ویرایش شد.']);
                }

                return response()->json(['status' => 201, 'message' => 'خطا در ویرایش امتیاز.']);
            }
        } else {
            return response()->json(['status' => 202, 'message' => 'شما این محصول را خریداری نکرده اید .']);
        }
    }

    public function insertComment($slug, Request $request) {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string',
        ]);

        if ($validator->errors()->count() > 0) {
            return $validator->errors();
        }

        $commentService = new CommentService();
        $request->request->add([
            'user_id' => Auth::id(),
            'shop_product_id' => $this->shopProductService->findIDWithSlug($slug)->id,
            'comment_parent_id' => 1,
        ]);
        if ($commentService->insert($request->all())) {
            return response()->json(['status' => 200, 'message' => 'نظر شما باموفقیت ثبت شد.']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در ثبت نظر ... مجددا تلاش کنید!']);
    }

    private function checkSale($shopProduct_id) {
        $shopOrderService = new ShopOrderService();
        $orderIds = Auth::user()->orders()->pluck('id');
        if ($orderIds) {
            $shopOrdersIDS = $shopOrderService->getShopOrdersIDFromOrders($orderIds);
            if ($shopOrdersIDS) {
                return ShopOrderProduct::whereIn('shop_order_id', $shopOrdersIDS)
                    ->where('shop_product_id', $shopProduct_id)->exists();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
