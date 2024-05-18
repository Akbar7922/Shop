<?php

namespace App\Services;

use App\Models\City;
use App\Models\User;
use Hash;
use Illuminate\Database\QueryException;

class UserService {
    public function create($data) {
        try {
            User::create($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function update($id, $data) {
        try {
            User::where('id', $id)->update($data);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function resetPassword($mobile, $password) {
        try {
            User::where('mobile', $mobile)->update(['password' => Hash::make($password)]);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function checkExistsMobile($mobile) {
        return User::where('mobile', $mobile)->exists();
    }

    public function all() {
        return User::paginate(2);
    }

    public function find($user_id) {
        return User::findOrFail($user_id);
    }

    public function findWithMobile($mobile) {
        return User::where('mobile', $mobile)->first();
    }

    public function searchWithMobile($mobile) {
        return User::where('mobile', 'LIKE', '%'.$mobile.'%')->get();
    }

    public function deleteAddress($user, $request) {
        $position = $request->position;
        $address = json_decode($user->addresses, true);
        unset($address[$position]);

        return $this->updateAddress($user->id, json_encode($address));
    }

    public function addAddress($user, $request) {
        $cityService = new CityService();
        $data = [
            'title' => $request->title,
            'city_id' => $request->city_id,
            'city' => $cityService->getName($request->city_id),
            'state_id' => $request->state_id,
            'state' => $cityService->getName($request->state_id),
            'postalCode' => $request->postalCode,
            'address' => $request->address,
            'isSelect' => 0,
        ];

        $address = json_decode($user->addresses, true);
        $address[] = $data;

        return $this->updateAddress($user->id, json_encode($address));
    }

    public function updateUserAddress($user, $request) {
        $cityService = new CityService();
        $data = [
            'title' => $request->title,
            'city_id' => $request->city_id,
            'city' => $cityService->getName($request->city_id),
            'state_id' => $request->state_id,
            'state' => $cityService->getName($request->state_id),
            'postalCode' => $request->postalCode,
            'address' => $request->address,
            'isSelect' => 0,
        ];

        $address = json_decode($user->addresses, true);
        $address[$request->position] = $data;

        return $this->updateAddress($user->id, json_encode($address));
    }

    public function updateAddress($user_id, $address) {
        try {
            User::where('id', $user_id)->update(['addresses' => $address]);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function deleteByMobile($mobile) {
        try {
            User::where('mobile', $mobile)->delete();

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function updateAvatar($user_id, $avatar) {
        try {
            User::where('id', $user_id)->update(['pic' => $avatar]);

            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function getCustommers() {
        return User::whereUserTypeId(1)->get();
    }

    public function searchFilter($type , $state , $city){
        $users = User::query();
        if($type)
            $users = $users->whereUserTypeId($type);
        if($state){
            $cities_id = City::whereParentId($state)->pluck('id');
            $users = $users->whereIn('city_id' , $cities_id);
        }if($city)
            $users = $users->whereCityId($city);

        return $users->paginate(3);
    }

    public function search($word){
        return User::orWhere('name' , 'like' , '%'.$word.'%')
                    ->orWhere('family' , 'like' , '%'.$word.'%')->paginate(2);
    }
}
