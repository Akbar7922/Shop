<?php

namespace App\Services;

use App\Models\City;

class CityService {
    public static function getStates() {
        return City::where('parent_id', 1)->where('id', '>', 1)->get();
    }

    public function getCities($state_id) {
        return City::where('parent_id', $state_id)->get();
    }

    public function find($city_id) {
        return City::findOrFail($city_id);
    }

    public function getName($id) {
        return City::findOrFail($id)->name;
    }
}
