<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller {
    public function getCities(Request $request) {
        $cityService = new CityService();

        return $cityService->getCities($request->state_id);
    }
}
