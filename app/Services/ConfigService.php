<?php
namespace App\Services;

use App\Models\Config;
use Illuminate\Database\QueryException;

class ConfigService{

    public function create($data){
        try {
            Config::updateOrCreate(['id' => 1] , $data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }
}