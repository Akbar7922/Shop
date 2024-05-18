<?php

namespace App\Services;

use App\Models\Condition;
use Illuminate\Database\QueryException;

class ConditionsService
{
    public function getJobConditins($job_id){
        return Condition::whereJobId($job_id)->paginate(10);
    }

    public function create($data)
    {
        try {
            return Condition::create($data);
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            Condition::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            Condition::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return Condition::findOrFail($id);
    }

}
