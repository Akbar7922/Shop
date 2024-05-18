<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\ShopProduct;
use Illuminate\Database\QueryException;

class BrandService {
    public function all() {
        return Brand::where('id', '>', 1)->where('parent_brand_id', 1)->get();
    }

    public function paginate() {
        return Brand::where('id', '>', 1)->paginate(5);
    }

    public function search($word){
        return Brand::where('id' , '>' , 1)->where('name' , 'like' , '%'.$word.'%')->paginate(5);
    }

    public function find($slug) {
        return Brand::where('slug', $slug)->first();
    }

    public function delete($slug) {
        try {
            Brand::where('slug', $slug)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function create($data) {
        try {
            return Brand::create($data)->id;
        } catch (QueryException $exception) {
            return 0;
        }
    }

    public function update($data, $slug) {
        try {
            $brand = Brand::where('slug', $slug)->first();
            $brand->fill($data);
            $brand->save();

            return $brand->id;
        } catch (QueryException $exception) {
            return 0;
        }
    }

    public function haveProducts($slug){
        $brand_id = Brand::whereSlug($slug)->first()->id;
        return ShopProduct::whereBrandId($brand_id)->exists();
    }
}
