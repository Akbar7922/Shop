<?php

namespace App\Services;

use App\Models\Advertising;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class AdvertisingService
{

    public function all()
    {
        return Advertising::paginate(20);
    }

    public function activeAdvertising()
    {
        $today = Carbon::now()->toDateTimeString();
        return Advertising::query()->where('start_date', '<', $today)
            ->where('end_date', '>', $today)->get();
    }

    public function create($data)
    {
        try {
            Advertising::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            Advertising::where('id', $id)->update($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
    public function delete($id)
    {
        try {
            Advertising::findOrFail($id)->delete();
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function find($id){
        return Advertising::findOrFail($id);
    }

    public function search($word){
        return Advertising::where('title' , 'like' , '%'.$word.'%')->paginate(20);
    }
}
