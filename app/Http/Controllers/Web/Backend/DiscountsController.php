<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\DiscountService;
use App\Services\GroupService;
use App\Services\ShopProductService;
use App\Services\ShopService;
use App\Services\UserService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountsController extends Controller {
    protected $discountService;

    public function __construct(DiscountService $discountService) {
        $this->discountService = $discountService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $discounts = $this->discountService->all();

        return view('backend.discounts.index', compact(['discounts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $shopService = new ShopService();
        $groupService = new GroupService();
        $shops = $shopService->getShops(Auth::user()->user_type_id);
        $groups = $groupService->all();

        return view('backend.discounts.create', compact(['shops', 'groups']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    private $start_date;

    private $end_date;

    private $start_time;

    private $end_time;

    private $code;

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'code' => 'required',
            'discount' => 'required',
        ]);
        $validator->customMessages = [
            'start_date.required' => 'تاریخ شروع اجباری است.',
            'end_date.required' => 'تاریخ پایان اجباری است',
            'code.required' => 'کدتخفیف اجباری است',
            'discount.required' => 'مقدار تخفیف اجباری است',
        ];

        $this->start_date = $request->start_date;
        $this->end_date = $request->end_date;
        $this->start_time = $request->start_time;
        $this->end_time = $request->end_time;
        $this->code = $request->code;
        $validator->after(function ($validator) {
            if (! $validator->errors()->has(['start_date', 'end_date'])) {
                if ($this->start_date == $this->end_date) {
                    if ($this->start_time >= $this->end_time) {
                        $validator->errors()->add('start_time', 'ساعت شروع و پایان نامعتبر است.');
                    }
                } elseif ($this->start_date > $this->end_date) {
                    $validator->errors()->add('end_date', 'تاریخ پایان نامعتبر است.');
                }
            }

            if (! $validator->errors()->hasAny()) {
                if ($this->discountService->checkExistsCode($this->code)) {
                    $validator->errors()->add('code', 'این کدتخفیف قبلا استفاده شده است.');
                }
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

        $data = [
            'shop_id' => 0,
            'shop_product_id' => 0,
            'category_id' => 0,
            'brand_id' => 0,
            'discount_price' => 0,
            'discount_percentage' => 0,
            'user_id' => 0,
            'group_id' => 0,
            'start_date' => $request->start_date.' '.$request->start_time,
            'end_date' => $request->end_date.' '.$request->end_time,
            'discount_code' => $request->code,
            'register_user_id' => Auth::id(),
        ];
        if ($request->for == 0) {
            $data['group_id'] = $request->group_id;
        } elseif ($request->for == 1) {
            $data['user_id'] = $request->user_id;
        }

        switch ($request->entity) {
            case 0:
                $data['shop_id'] = $request->shop_id;
                break;
            case 1:
                $data['shop_product_id'] = $request->shop_product_id;
                break;
            case 2:
                $data['category_id'] = $request->category_id;
                break;
            case 3:
                $data['brand_id'] = $request->brand_id;
                break;
        }
        if ($request->isPercentage == 0) {
            $data['discount_price'] = str_replace(',', '', $request->discount);
        } elseif ($request->isPercentage == 1) {
            $data['discount_percentage'] = $request->discount;
        }

        if ($this->discountService->create($data)) {
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'تخفیف باموفقیت ثبت شد.']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ثبت تخفیف ، مجددا تلاش کنید !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $discount = $this->discountService->find($id);
        return view('backend.discounts.show' , compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $discount = $this->discountService->find($id);
        if ($discount->shop_id > 0) {
            $entityType = 'shop_id';
            $shopService = new ShopService();
            $entity = $shopService->getShops(Auth::user()->user_type_id);
        } elseif ($discount->shop_product_id > 0) {
            $entityType = 'shop_product_id';
            $shopProductService = new ShopProductService();
            $entity = $shopProductService->all();
        } elseif ($discount->category_id > 0) {
            $entityType = 'category_id';
            $categoryService = new CategoryService();
            $entity = $categoryService->categories();
        } elseif ($discount->brand_id > 0) {
            $entityType = 'brand_id';
            $brandService = new BrandService();
            $entity = $brandService->all();
        }

        if ($discount->user_id > 0) {
            $forType = 'user_id';
            $userService = new UserService();
            $for = $userService->all();
        } elseif ($discount->group_id > 0) {
            $forType = 'group_id';
            $groupService = new GroupService();
            $for = $groupService->all();
        }

        return view('backend.discounts.edit', compact(['discount', 'entity', 'entityType', 'forType', 'for']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected $discount_id;

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'code' => 'required',
            'discount' => 'required',
        ]);
        $validator->customMessages = [
            'start_date.required' => 'تاریخ شروع اجباری است.',
            'end_date.required' => 'تاریخ پایان اجباری است',
            'code.required' => 'کدتخفیف اجباری است',
            'discount.required' => 'مقدار تخفیف اجباری است',
        ];

        $this->start_date = $request->start_date;
        $this->end_date = $request->end_date;
        $this->start_time = $request->start_time;
        $this->end_time = $request->end_time;
        $this->code = $request->code;
        $this->discount_id = $id;
        $validator->after(function ($validator) {
            if (! $validator->errors()->has(['start_date', 'end_date'])) {
                if ($this->start_date == $this->end_date) {
                    if ($this->start_time >= $this->end_time) {
                        $validator->errors()->add('start_time', 'ساعت شروع و پایان نامعتبر است.');
                    }
                } elseif ($this->start_date > $this->end_date) {
                    $validator->errors()->add('end_date', 'تاریخ پایان نامعتبر است.');
                }
            }

            if (! $validator->errors()->hasAny()) {
                if ($this->discountService->checkExistsCodeUpdate($this->code, $this->discount_id)) {
                    $validator->errors()->add('code', 'این کدتخفیف قبلا استفاده شده است.');
                }
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

        $data = [
            'shop_id' => 0,
            'shop_product_id' => 0,
            'category_id' => 0,
            'brand_id' => 0,
            'discount_price' => 0,
            'discount_percentage' => 0,
            'user_id' => 0,
            'group_id' => 0,
            'start_date' => $request->start_date.' '.$request->start_time,
            'end_date' => $request->end_date.' '.$request->end_time,
            'discount_code' => $request->code,
        ];
        if ($request->for == 0) {
            $data['group_id'] = $request->group_id;
        } elseif ($request->for == 1) {
            $data['user_id'] = $request->user_id;
        }

        switch ($request->entity) {
            case 0:
                $data['shop_id'] = $request->shop_id;
                break;
            case 1:
                $data['shop_product_id'] = $request->shop_product_id;
                break;
            case 2:
                $data['category_id'] = $request->category_id;
                break;
            case 3:
                $data['brand_id'] = $request->brand_id;
                break;
        }
        if ($request->isPercentage == 0) {
            $data['discount_price'] = str_replace(',', '', $request->discount);
        } elseif ($request->isPercentage == 1) {
            $data['discount_percentage'] = $request->discount;
        }

        if ($this->discountService->update($id, $data)) {
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'تخفیف باموفقیت ویرایش شد.']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش تخفیف ، مجددا تلاش کنید !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if ($this->discountService->delete($id)) {
            return response()->json(['status' => 200, 'message' => 'تخفیف باموفقیت حذف شد .']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف تخفیف .']);
    }

    public function generateCode() {
        return response()->json(['status' => 200, 'message' => 'عملیات باموفقیت انجام شد.', 'code' => 'BKH-nourooz']);
    }

    public function validateCode(Request $request) {
        if ($request->discount_id == 0) {
            if ($this->discountService->checkExistsCode($request->discountCode)) {
                return response()->json(['status' => 201, 'message' => 'کد وارد شده قبلا استفاده شده است ']);
            }

            return response()->json(['status' => 200, 'message' => 'کد وارد شده درست میباشد ']);
        } elseif ($request->discount_id > 0) {
            if ($this->discountService->checkExistsCodeUpdate($request->discountCode, $request->discount_id)) {
                return response()->json(['status' => 201, 'message' => 'کد وارد شده قبلا استفاده شده است ']);
            }

            return response()->json(['status' => 200, 'message' => 'کد وارد شده درست میباشد ']);
        }
    }
}
