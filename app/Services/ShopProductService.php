<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use App\Models\ShopProduct;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\QueryException;

class ShopProductService
{
    public function all()
    {
        return ShopProduct::paginate(15);
    }

    public function allProducts($limit)
    {
        return ShopProduct::query()->limit($limit)->paginate(20);
    }

    public function latestProducts()
    {
        return ShopProduct::query()
            ->orderByDesc('created_at')->get();
    }

    public function bestSellingProducts()
    {
        return ShopProduct::query()
            ->get();
    }

    public function create($data)
    {
        try {
            $data['barcode'] = '-';
            $shop_product = ShopProduct::create($data);
            $shop_product->update(['barcode' => $this->generateBarcode($shop_product->id)]);

            return true;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }

    public function find($id)
    {
        return ShopProduct::findOrFail($id);
    }

    public function findWithSlug($slug)
    {
        return ShopProduct::where('slug', $slug)->with(['shop', 'properties'])->first();
    }

    public function findIDWithSlug($slug)
    {
        return ShopProduct::select('id')->where('slug', $slug)->first();
    }

    public function update($id, $data)
    {
        try {
            $shop_product = ShopProduct::findOrFail($id);
            $shop_product->fill($data);
            $shop_product->save();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function decrement($id, $count)
    {
        try {
            ShopProduct::query()->where('id', $id)->decrement('count', $count);

            return true;
        } catch (QueryException $queryException) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            ShopProduct::where('id', $id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function getShopProductsOfManager($user_type_id, $manager_id)
    {
        if ($user_type_id == 3) {
            return ShopProduct::with('product')->paginate(15);
        } else {
            $shops = Shop::whereManagerUserId($manager_id)->get();

            return ShopProduct::whereIn('shop_id', $shops)->paginate(15);
        }
    }

    public function productsFromSearch($category_id, $brand_id)
    {
        $categoryProducts = Product::query()->select('id')
            ->where('category_id', $category_id)->get();

        return ShopProduct::where('brand_id', $brand_id)
            ->whereIn('product_id', $categoryProducts)->get();
    }

    private function generateBarcode($shop_product_id)
    {
        return 'SPD-' . $this->threeDigits($shop_product_id) . $this->date();
    }

    private function date()
    {
        $dateTime = str_replace(['-', ':', ' '], '', Carbon::now()->toDateTimeString());

        return substr($dateTime, 2, strlen($dateTime));
    }

    private function threeDigits($number)
    {
        if (strlen($number) > 3) {
            return substr($number, strlen($number) - 3, strlen($number));
        }

        return sprintf('%03u', $number);
    }

    public function similarProduct($category_id)
    {
        return ShopProduct::with(['product' => function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        }])->with('product')->get();
    }

    public function otherHaveBoughtProducts($product_id)
    {
    }

    public function getProductsOfCategory($category_id)
    {
        if ($category_id) {
            $categori_ids = Category::select('id')->where('id', $category_id)
                ->orWhere('parent_cat_id', $category_id)->get()->toArray();
            $productIds = Product::select('id')->whereIn('category_id', $categori_ids)->get()->toArray();

            return ShopProduct::whereIn('product_id', $productIds)->paginate(20);
        } else {
            return ShopProduct::forPage(3)->paginate(20);
        }
    }

    private $cats = [];
    public function getSearchProducts($brands, $categories, $word, $exists, $special, $hasDiscount, $hasPicture)
    {
        $isFilter = false;
        $catProducts = [];
        $brandProducts = [];
        $wordProducts = [];

        if ($categories) {
            $isFilter = true;
            $this->cats = $categories;
            $catProducts = ShopProduct::whereHas('product', function ($query2) {
                return $query2->whereIn('category_id', $this->cats);
            })->get();
            // $category_ids = Category::select('id')->orWhereIn('id', $categories)
            //     ->orWhereIn('parent_cat_id', $categories)->get();
            // if ($category_ids) {
            /* $product_ids = Product::select('id')->whereIn('category_id', $categories);
            if ($product_ids) {
                $catProducts = ShopProduct::select()->whereIn('product_id', $product_ids)->get();
            } */
            // }
        }
        if ($brands) {
            $isFilter = true;
            $brandProducts = ShopProduct::select()->whereIn('brand_id', $brands)->get();
        }

        if ($word) {
            $isFilter = true;
            $productIDS = Product::select('id')->where('name', 'like', '%' . $word . '%')->get();
            if ($productIDS) {
                $wordProducts = ShopProduct::select()->whereIn('product_id', $productIDS)->get();
            }
        }

        if ($isFilter) {
            $res = [];
            if ($catProducts) {
                $res = $catProducts->merge($res);
            }
            if ($brandProducts) {
                $res = $brandProducts->merge($res);
            }
            if ($wordProducts) {
                $res = $wordProducts->merge($res);
            }

            if ($res) {
                return new Paginator($res, 20);
            } else {
                return null;
            }
        }

        return ShopProduct::select()->paginate(20);
    }

    private $word;
    public function search($word){
        $this->word = $word;
        return ShopProduct::orWhere('barcode' , 'like' , '%'.$word.'%')->orWhereHas('product' , function ($query){
            return $query->where('name' ,'like' , '%'.$this->word.'%' );
        })->paginate(10);
    }

}
