<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductService {
    public function allArray() {
        return Product::where('isDel', 0)->get();
    }

    public function all() {
        return Product::where('isDel', 0)->paginate(15);
    }

    public function create($data) {
        try {
            $data['barcode'] = '-';
            $product = Product::create($data);
            $product->update(['barcode' => $this->createBarcode($product->id)]);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    private function createBarcode($product_id) {
        return 'PRD-'.$product_id.time();
    }

    public function find($id) {
        return Product::findOrFail($id);
    }

    public function update($id, $data) {
        try {
            Product::where('id', $id)->update($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function delete($id) {
        try {
            Product::where('id', $id)->update(['isDel' => 1]);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function search($word){
        return Product::orWhere('name' , 'like' , '%'.$word.'%')
                        ->orWhere('en_name' , 'like' , '%'.$word.'%')
                        ->orWhere('barcode' , 'like' , '%'.$word.'%')
                        ->paginate(10);
    }
}
