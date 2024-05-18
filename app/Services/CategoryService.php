<?php

namespace App\Services;

use App\Models\Category;
use App\Models\ShopProduct;
use Illuminate\Database\QueryException;

class CategoryService {
    public function categories() {
        return Category::where('id' , '>' , 1)->get();
    }

    public function mainCategories() {
        return Category::where('parent_cat_id', 1)->where('id' , '>' , 1)->get();
    }

    public function paginate() {
        return Category::where('id', '>', 1)->paginate(10);
    }

    public function search($word){
        return Category::where('id', '>', 1)->where('name' , 'like' , '%'.$word.'%')->paginate(10);
    }

    public function find($slug) {
        return Category::where('slug', $slug)->first();
    }

    public function delete($slug) {
        try {
            Category::where('slug', $slug)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function create($data) {
        try {
            return Category::create($data)->id;
        } catch (QueryException $exception) {
            return 0;
        }
    }

    public function update($data, $slug) {
        try {
            $category = Category::where('slug', $slug)->first();
            $category->fill($data);
            $category->save();

            return $category->id;
        } catch (QueryException $exception) {
            return 0;
        }
    }

    private $category_id;
    public function haveProduct($slug){
        $this->category_id = Category::whereSlug($slug)->first()->id;
        return ShopProduct::whereHas('product' , function ($query){
            $query->where('category_id' , $this->category_id);
        })->exists();
    }
}
