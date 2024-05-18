<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Database\QueryException;

class VideoService
{
    public function all(){
        return Video::paginate(12);
    }
    public function create($data)
    {
        try {
            Video::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            Video::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            Video::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return Video::findOrFail($id);
    }

    public function search($word){
        return Video::where('title' , 'like' , '%'.$word.'%')->paginate(12);
    }
}
