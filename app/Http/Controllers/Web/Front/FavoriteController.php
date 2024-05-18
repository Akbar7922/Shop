<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Services\FavoriteService;
use Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller {
    //     Value for Entity_type column    0 -> shopProduct  , 1 -> Category  , 2 -> Brand
    protected FavoriteService $favoriteService;

    public function __construct(FavoriteService $favoriteService) {
        $this->favoriteService = $favoriteService;
    }

    public function addProductToFavorites(Request $request) {
        $request->request->add([
            'brand_id' => 1,
            'category_id' => 1,
            'user_id' => Auth::id(),
            'entity_type' => 0,
            'register_user_id' => Auth::id(),
        ]);
        if ($this->favoriteService->exists($request->user_id, $request->shop_product_id)) {
            if ($this->favoriteService->deleteFromUser($request->user_id, $request->shop_product_id)) {
                return response()->json(['status' => 200, 'message' => 'کالا باموفقیت از لیست موردعلاقه حذف شد .']);
            }

            return response()->json(['status' => 201, 'message' => 'خطا در عملیات !']);
        }
        if ($this->favoriteService->create($request->all())) {
            return response()->json(['status' => 200, 'message' => 'کالا باموفقیت به لیست موردعلاقه اضافه شد .']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در عملیات !']);
    }
}
