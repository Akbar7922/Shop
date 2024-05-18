<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\CityService;
use App\Services\ShopService;
use Auth;
use Illuminate\Http\Request;

class ShopController extends Controller {
    protected $shopService;

    public function __construct(ShopService $shopService) {
        $this->shopService = $shopService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $shops = $this->shopService->all();

        return view('backend.shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categoryService = new CategoryService();
        $cityService = new CityService();
        $categories = $categoryService->mainCategories();
        $states = $cityService->getStates();
        $shops = $this->shopService->all();

        return view('backend.shops.create', compact(['categories', 'states', 'shops']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $hourses = [
            'morning_at' => $request->morning_at,
            'morning_to' => $request->morning_to,
            'afternoon_at' => $request->afternoon_at,
            'afternoon_to' => $request->afternoon_to,
        ];
        $hourseOfWork = $this->createHourseOfWork($hourses);
        $data = [
            'manager_user_id' => $request->manager,
            'name' => $request->name,
            'manager_moblie' => $request->manager_mobile,
            'manager_natoinalCode' => $request->nationalCode,
            'category_id' => $request->category_id,
            'tell' => json_encode([$request->tell]),
            'city_id' => $request->city_id,
            'addresses' => $this->createAddress($request->city_id, $request->address, '1111111111'),
            'main_shop_id' => $request->center_shop_id,
            'hoursOfWork' => $hourseOfWork,
            'logo' => 'logo.'.$request->file('logo')->extension(),
            'shopType' => $request->type,
            'license' => 'license.'.$request->file('license')->extension(),
            'contract' => 'contract.'.$request->file('contract')->extension(),
            'start_contract_date' => $request->start_date,
            'end_contract_date' => $request->end_date,
            'manager_pic' => 'pic.png',
            'register_user_id' => Auth::id(),
        ];

        $shop_id = $this->shopService->create($data);
        if ($shop_id > 0) {
            $filePath = public_path().'/image/shops/'.$shop_id.'/';
            if ($request->has('logo')) {
                $logo = $request->file('logo');
                $logo->move($filePath, $data['logo']);
            }
            if ($request->has('license')) {
                $license = $request->file('license');
                $license->move($filePath, $data['license']);
            }
            if ($request->has('contract')) {
                $contract = $request->file('contract');
                $contract->move($filePath, $data['contract']);
            }

            return redirect()->back()->with('status', ['status' => 200, 'message' => 'فروشگاه باموفقیت افزوده شد.']);
        } else {
            return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ثبت فروشگاه.']);
        }
    }

    private function createAddress($city_id, $address, $postalCode) {
        $cityService = new CityService();
        $city = $cityService->find($city_id);
        $addresses[] = [
            'city_id' => $city_id,
            'city' => $city->name,
            'state_id' => $city->parent_id,
            'state' => $city->parent->name,
            'address' => $address,
            'postalCode' => $postalCode,
        ];

        return json_encode($addresses);
    }

    private function createHourseOfWork($data) {
        foreach ($data['morning_at'] as $index => $item) {
            $object = [
                'morning_at' => $data['morning_at'][$index][0],
                'morning_to' => $data['morning_to'][$index][0],
                'afternoon_at' => $data['afternoon_at'][$index][0],
                'afternoon_to' => $data['afternoon_to'][$index][0],
            ];
            $hourseOfWork[$index] = $object;
        }

        return json_encode($hourseOfWork);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $categoryService = new CategoryService();
        $cityService = new CityService();
        $categories = $categoryService->mainCategories();
        $states = $cityService->getStates();
        $shops = $this->shopService->all();
        $shop = $this->shopService->find($id);

        return view('backend.shops.edit', compact(['shop', 'shops', 'states', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $hourses = [
            'morning_at' => $request->morning_at,
            'morning_to' => $request->morning_to,
            'afternoon_at' => $request->afternoon_at,
            'afternoon_to' => $request->afternoon_to,
        ];
        $hourseOfWork = $this->createHourseOfWork($hourses);
        $data = [
            'manager_user_id' => $request->manager,
            'name' => $request->name,
            'manager_moblie' => $request->manager_mobile,
            'manager_natoinalCode' => $request->nationalCode,
            'category_id' => $request->category_id,
            'tell' => json_encode([$request->tell]),
            'city_id' => $request->city_id,
            'addresses' => $this->createAddress($request->city_id, $request->address, '1111111111'),
            'main_shop_id' => $request->center_shop_id,
            'hoursOfWork' => $hourseOfWork,
            'shopType' => $request->type,
            'start_contract_date' => $request->start_date,
            'end_contract_date' => $request->end_date,
            'manager_pic' => 'pic.png',
            'register_user_id' => Auth::id(),
        ];
        if ($request->has('logo')) {
            $data['logo'] = 'logo.'.$request->file('logo')->extension();
        }

        $shop_id = $this->shopService->update($id, $data);
        if ($shop_id > 0) {
            $filePath = public_path().'/image/shops/'.$id.'/';
            if ($request->has('logo')) {
                $logo = $request->file('logo');
                $logo->move($filePath, $data['logo']);
            }
            if ($request->has('license')) {
                $license = $request->file('license');
                $license->move($filePath, 'license.'.$license->extension());
            }
            if ($request->has('contract')) {
                $contract = $request->file('contract');
                $contract->move($filePath, 'contract.'.$contract->extension());
            }

            return redirect()->back()->with('status', ['status' => 200, 'message' => 'فروشگاه باموفقیت ویرایش شد.']);
        } else {
            return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش فروشگاه.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if ($this->shopService->delete($id)) {
            return response()->json(['status' => 200, 'message' => 'فروشگاه باموفقیت حذف شد .']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف فروشگاه .']);
    }

    public function getShops() {
        return $this->shopService->all();
    }

    public function search(Request $request){
        $shops = $this->shopService->search($request->word);
        return view('backend.shops.partial' , compact('shops'));
    }
}
