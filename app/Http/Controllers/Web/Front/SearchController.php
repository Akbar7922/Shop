<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ShopProductService;
use Illuminate\Http\Request;

class SearchController extends Controller {
    protected $shopProductService;

    public function __construct(ShopProductService $shopProductService) {
        $this->shopProductService = $shopProductService;
    }

    public function index() {
        //        if (request()->has('category'))
        //            $products = $this->shopProductService->getProductsOfCategory(request()->category);
        //        else
        //            $products = $this->shopProductService->allProducts(50);

        $categoryService = new CategoryService();
        $brandService = new BrandService();
        $brands = $brandService->all();
        $categories = $categoryService->mainCategories();

        return view('frontend.web.search', compact(['categories', 'brands']));
    }

    public function searchAjax(Request $request) {
        $categories[] = null;
        $brands = null;
        $word = null;
        if ($request->has('categories')) {
            $categories = $request->categories;
        }
        if ($request->has('brands')) {
            $brands = $request->brands;
        }
        if ($request->has('word')) {
            $word = $request->word;
        }

        $products = $this->shopProductService->getSearchProducts($brands, $categories, $word, null, null, null, null);
        return view('frontend.partial.product_search', compact('products'));
    }
}
