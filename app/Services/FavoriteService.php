<?php

namespace App\Services;

use App\Models\Favorite;
use Illuminate\Database\QueryException;

class FavoriteService {
    //     Value for Entity_type column    0 -> shopProduct  , 1 -> Category  , 2 -> Brand

    public function getUserFavorites($user_id) {
        return Favorite::where(['isDel' => 0, 'user_id' => $user_id])->get();
    }

    public function create($data) {
        try {
            Favorite::create($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function delete($id) {
        try {
            Favorite::where('id', $id)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function deleteFromUser($user_id, $shop_product_id) {
        try {
            Favorite::where(['user_id' => $user_id, 'shop_product_id' => $shop_product_id])->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function exists($user_id, $shop_product_id) {
        return Favorite::where(['user_id' => $user_id, 'shop_product_id' => $shop_product_id])->exists();
    }
}
