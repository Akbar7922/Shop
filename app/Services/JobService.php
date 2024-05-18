<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Database\QueryException;

class JobService
{
    public function all(){
        return Job::with('city')->paginate(10);
    }

    public function create($data)
    {
        try {
            Job::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            Job::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            Job::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return Job::findOrFail($id);
    }

    public function search($word){
        return Job::where('name' , 'like' , '%'.$word.'%')->paginate(20);
    }

}
