<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\CityService;
use App\Services\UserService;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Factory;
use Validator;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->all();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $uniqueCode = 'BKH-' . substr($request->mobile, 1, strlen($request->mobile));
        if (!$this->userService->checkExistsMobile($request->mobile)) {
            $request->request->add(['unique_code' => $uniqueCode]);
            $request->request->add(['user_type_id' => 1]);
            $request->request->add(['isMale' => $request->gender]);
            $request->request->add(['password' => bcrypt(substr($request->mobile, 1, strlen($request->mobile)))]);
            $request->request->add(['register_user_id' => Auth::id()]);
            if ($this->userService->create($request->all())) {
                Session::put('status', ['status' => 200, 'message' => 'کاربر باموفقیت افزوده شد .']);
            } else {
                Session::put('status', ['status' => 201, 'message' => 'خطا در ثبت کاربر .']);
            }
        } else {
            Session::put('status', ['status' => 202, 'message' => 'بااین شماره قبلا ثبت نام شده است .']);
        }

        return redirect(route('user.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->find($id);
        return view('backend.users.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Factory
     */
    public function edit(int $id)
    {
        $cityService = new CityService();
        $user = $this->userService->find($id);
        $states = $cityService->getStates();

        return view('backend.users.edit', compact(['user', 'states']));
    }

    public function update(Request $request, int $id)
    {
        $data = [
            'name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'tell' => $request->tell,
            'city_id' => $request->city_id,
            'isMale' => $request->gender,
        ];
        if ($this->userService->update($id, $data)) {
            return redirect(route('user.index'))->with('status', ['status' => 200, 'message' => 'کاربر باموفقیت ویرایش شد .']);
        }

        return redirect(route('user.index'))->with('status', ['status' => 201, 'message' => 'خطا در ویرایش کاربر .']);
    }

    public function destroy($mobile): JsonResponse
    {
        if ($this->userService->deleteByMobile($mobile))
            return response()->json(['status' => 200, 'message' => 'کاربر باموفقیت حذف شد .']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف کاربر .']);
    }

    public function addresses($user_id)
    {
        $cityService = new CityService();
        $user = $this->userService->find($user_id);
        $states = $cityService->getStates();

        return view('backend.users.addresses', compact(['user', 'states']));
    }

    public function deleteAddress($user_id, Request $request)
    {
        $user = $this->userService->find($user_id);
        $position = $request->position;
        $address = json_decode($user->addresses, true);
        unset($address[$position]);
        if ($this->userService->updateAddress($user_id, json_encode($address))) {
            return response()->json(['status' => 200, 'message' => 'آدرس با موفقیت حذف شد.']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف آدرس !']);
    }

    public function addAddress($user_id, Request $request)
    {
        $user = $this->userService->find($user_id);
        $data = [
            'title' => $request->title,
            'city_id' => $request->city_id,
            'city' => trim($request->city),
            'state_id' => $request->state_id,
            'state' => trim($request->state),
            'postalCode' => $request->postalCode,
            'address' => $request->address,
            'isSelect' => 0,
        ];

        $address = json_decode($user->addresses, true);
        $address[] = $data;
        if ($this->userService->updateAddress($user_id, json_encode($address))) {
            return redirect(route('user.addresses', $user_id))->with('status', ['status' => 200, 'message' => 'آدرس با موفقیت افزوده شد.']);
        }

        return redirect(route('user.addresses', $user_id))->with('status', ['status' => 201, 'message' => 'خطا در ثبت آدرس !']);
    }

    public function updateAddress($user_id, Request $request)
    {
        $user = $this->userService->find($user_id);
        $data = [
            'title' => $request->title,
            'city_id' => $request->city_id,
            'city' => trim($request->city),
            'state_id' => $request->state_id,
            'state' => trim($request->state),
            'postalCode' => $request->postalCode,
            'address' => $request->address,
            'isSelect' => 0,
        ];

        $address = json_decode($user->addresses, true);
        $address[$request->position] = $data;
        if ($this->userService->updateAddress($user_id, json_encode($address))) {
            return redirect(route('user.addresses', $user_id))->with('status', ['status' => 200, 'message' => 'آدرس با موفقیت ویرایش شد.']);
        }

        return redirect(route('user.addresses', $user_id))->with('status', ['status' => 201, 'message' => 'خطا در ویرایش آدرس !']);
    }

    public function seachUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric',
        ]);
        if ($validator->errors()->count() > 0)
            return response()->json(['status' => 201, 'message' => $validator->errors()]);
        return response()->json($this->userService->searchWithMobile($request->mobile));
        // return response()->json(['status' => 201, 'message' => $this->userService->searchWithMobile($request->mobile) ]);
    }

    public function getCustommers()
    {
        return $this->userService->getCustommers();
    }

    public function getUsersFilter(Request $request)
    {
        // $users = $this->userService->searchFilter($request);
        // return view('backend.groups.list' , compact(['users']));
    }

    public function search(Request $request)
    {
        $word = $request->word;
        $users = $this->userService->search($word);
        return view('backend.users.partial', compact('users'));
    }
}
