<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Database\QueryException;

class CommentService {

    public function all(){
        return Comment::paginate(20);
    }

    public function insert($data) {
        try {
            Comment::create($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function update($id , $data){
        try{
            Comment::whereId($id)->update($data);
            return true;
        }catch(QueryException $exception){
            return false;
        }
    }
}
