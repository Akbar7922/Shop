<?php

namespace App\Services;

use App\Models\Gallery;
use Illuminate\Database\QueryException;

class GalleryService
{
    public function all(){
        return Gallery::paginate(12);
    }
    public function create($data)
    {
        try {
            Gallery::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            Gallery::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            Gallery::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return Gallery::findOrFail($id);
    }

    public function search($word){
        return Gallery::where('title' , 'like' , '%'.$word.'%')->paginate(12);
    }

}
