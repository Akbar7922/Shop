<?php

namespace App\Services;

use App\Models\Group;
use Illuminate\Database\QueryException;

class GroupService
{
    public function all()
    {
        return Group::all();
    }
    public function paginate()
    {
        return Group::query()->paginate(20);
    }

    public function create($data)
    {
        try {
            return Group::create($data);
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }
    public function update($data , $id)
    {
        try {
            Group::whereId($id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }

    public function find($id)
    {
        return Group::findOrFail($id);
    }

    public function deleteWithUniqueName($unique_name)
    {
        try {
            Group::whereUniqueName($unique_name)->delete();
            return true;
        } catch (QueryException $exceprion) {
            return false;
        }
    }

    public function checkNameExists($unique_name, $group_id)
    {
        if ($group_id > 0)
            return Group::whereUniqueName($unique_name)->whereNot('id', $group_id)->exists();
        return Group::whereUniqueName($unique_name)->exists();
    }
}
