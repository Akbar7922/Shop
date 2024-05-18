<?php

namespace App\Services;

use App\Models\Shop;
use Auth;
use Illuminate\Database\QueryException;

class ShopService {
    public function all() {
        return Shop::paginate(20);
    }

    public function find($id) {
        return Shop::findOrFail($id);
    }

    public function create($data) {
        try {
            $shop = Shop::create($data);

            return $shop->id;
        } catch (QueryException $exception) {
            return 0;
        }
    }

    public function delete($id) {
        try {
            Shop::findOrFail($id)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $shop = Shop::findOrFail($id);
            $shop->fill($data);
            $shop->save();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function getShops($admin_type) {
        if ($admin_type == 3) {
            return Shop::all();
        } elseif ($admin_type == 2) {
            return Shop::whereManagerUserId(Auth::id());
        }
    }

    public function search($word){
        return Shop::where('name' , 'like' , '%'.$word.'%')->paginate(10);
    }
}
