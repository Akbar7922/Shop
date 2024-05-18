<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\CityService;
use App\Services\OrderService;
use App\Services\UserService;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Session;
use Validator;

class ProfileController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();

        return view('frontend.web.profile', compact(['categories']));
    }

    public function addresses()
    {
        $categoryService = new CategoryService();
        $cityService = new CityService();
        $categories = $categoryService->mainCategories();
        $states = $cityService->getStates();

        return view('frontend.web.profile.address', compact(['categories', 'states']));
    }

    public function orders()
    {
        $orderService = new OrderService();
        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();
        $orders = $orderService->getUserOrders(Auth::id());
        $view = (request()->ajax()) ? 'frontend.web.profile.orders_partial' : 'frontend.web.profile.orders';
        return view($view, compact(['categories', 'orders']));
    }

    public function orderDetails($trackingCode)
    {
        $orderService = new OrderService();
        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();
        // $result = $orderService->updateOrderProducts($trackingCode);
        $order = $orderService->getFromTrackingCode($trackingCode);
        if ($order->status_id == 1) {
            Session::put('order_update', $orderService->updateOrderProducts($trackingCode));
            $order = $orderService->getFromTrackingCode($trackingCode);
        }
        $products = $orderService->getOrderProducts($order->id);
        // return $result;
        return view('frontend.web.profile.order_details', compact(['categories', 'order', 'products']));
    }

    public function favorites()
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->mainCategories();
        $favorites = Auth::user()->favorites()->paginate(2);
        if (request()->ajax())
            return view('frontend.web.profile.favorites_partial', compact(['favorites']));
        return view('frontend.web.profile.favorites', compact(['categories', 'favorites']));
    }

    public function editProfile()
    {
        $categoryService = new CategoryService();
        $cityService = new CityService();
        $categories = $categoryService->mainCategories();
        $states = $cityService->getStates();

        return view('frontend.web.profile.edit_profile', compact(['categories', 'states']));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'family' => 'required|string',
            'city_id' => 'required|integer',
        ]);
        $validator->customMessages = [
            'name' => 'نام نامعتبر است.',
            'family' => 'نام خانوادگی نامعتبر است.',
            'city_id' => 'شهر نامعتبر است.',
        ];

        if ($validator->errors()->count() > 0) {
            return redirect()->back()->with('status', ['status' => 203, 'message' => $validator->errors()]);
        }

        $data = [
            'name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'tell' => $request->tell,
            'city_id' => $request->city_id,
            'isMale' => $request->gender,
        ];
        if ($this->userService->update(Auth::id(), $data)) {
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'اطلاعات باموفقیت ویرایش شد .']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش اطلاعات .']);
    }

    public function updatePassword(Request $request)
    {
        if (Auth::user()->password == Hash::check($request->old_password, Auth::user()->password)) {
            if ($request->password == $request->confirm_password) {
                if (Auth::user()->update(['password' => Hash::make($request->password)])) {
                    return redirect()->back()->with('status', ['status' => 200, 'message' => 'رمزعبور باموفقیت بروزرسانی شد .']);
                } else {
                    return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در بروزرسانی رمزعبور ، مجددا تلاش کنید!']);
                }
            } else {
                return redirect()->back()->with('status', ['status' => 202, 'message' => 'تکرار رمزعبور صحیح نیست .']);
            }
        } else {
            return redirect()->back()->with('status', ['status' => 203, 'message' => 'رمزعبور قبلی نامعتبر است .']);
        }
    }

    public function deleteAddress(Request $request)
    {
        $user = Auth::user();
        $position = $request->position;
        $address = json_decode($user->addresses, true);
        unset($address[$position]);
        if ($this->userService->updateAddress($user->id, json_encode($address))) {
            return response()->json(['status' => 200, 'message' => 'آدرس با موفقیت حذف شد.']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف آدرس !']);
    }

    public function addAddress(Request $request)
    {
        if ($this->userService->addAddress(Auth::user(), $request)) {
            return redirect(route('profile.addresses'))->with('status', ['status' => 200, 'message' => 'آدرس با موفقیت ثبت شد.']);
        }

        return redirect(route('profile.addresses'))->with('status', ['status' => 201, 'message' => 'خطا در ثبت آدرس !']);
    }

    public function updateAddress(Request $request)
    {
        if ($this->userService->updateUserAddress(Auth::user(), $request)) {
            return redirect(route('profile.addresses'))->with('status', ['status' => 200, 'message' => 'آدرس با موفقیت ویرایش شد.']);
        }

        return redirect(route('profile.addresses'))->with('status', ['status' => 201, 'message' => 'خطا در ویرایش آدرس !']);
    }

    public function updateAvatar(Request $request)
    {
        if ($request->has('picture')) {
            $image = $request->file('picture');
            $image_path = public_path('image/users/');
            $image_name = Auth::id() . '_' . time() . '.png';
            if (Auth::user()->pic != null) {
                if (file_exists($image_path . Auth::user()->pic)) {
                    unlink($image_path . Auth::user()->pic);
                }
            }

            if ($image->move($image_path, $image_name)) {
                if ($this->userService->updateAvatar(Auth::id(), $image_name)) {
                    return redirect()->back()->with('status', ['status' => 200, 'message' => 'تصویر با موفقیت بارگذاری شد.']);
                } else {
                    return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش تصویر !']);
                }
            } else {
                return redirect()->back()->with('status', ['status' => 202, 'message' => 'خطا در بارگذاری تصویر !']);
            }
        } else {
            return redirect()->back()->with('status', ['status' => 203, 'message' => 'تصویری برای بارگذاری فرستاده نشده.']);
        }
    }
}
