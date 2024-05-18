<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\QueryException;

class ProjectService
{
    public function all(){
        return Project::paginate(12);
    }
    public function create($data)
    {
        try {
            Project::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            Project::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            Project::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return Project::findOrFail($id);
    }

    public function search($word){
        return Project::where('title' , 'like' , '%'.$word.'%')->paginate(12);
    }
}
