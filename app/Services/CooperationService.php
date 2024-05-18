<?php

namespace App\Services;

use App\Models\CooperationRequest;
use Illuminate\Database\QueryException;

class CooperationService
{
    public function all(){
        return CooperationRequest::paginate(12);
    }
    public function create($data)
    {
        try {
            CooperationRequest::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            CooperationRequest::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            CooperationRequest::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return CooperationRequest::findOrFail($id);
    }

    public function search($word){
        return CooperationRequest::where('fullName' , 'like' , '%'.$word.'%')->paginate(12);
    }
}
