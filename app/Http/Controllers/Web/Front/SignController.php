<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SignController extends Controller {
    public function loginCodeForm() {
        return view('auth.login_code');
    }

    public function loginCode(Request $request) {
        $userService = new UserService();
        if ($userService->checkExistsMobile($request->mobile)) {
            if (Auth::login($userService->findWithMobile($request->mobile))) {
                return redirect(route('home'));
            } else {
                return redirect(route('login'));
            }
        } else {
            return redirect(route('login'))->with('status', ['status' => 203, 'message' => 'شما ثبت نام نکرده اید.']);
        }
    }

    public function sendCode(Request $request): JsonResponse {
        $userService = new UserService();
        $mobile = $request->mobile;
        if (! $userService->checkExistsMobile($mobile)) {
            $code = $this->createCode();
            Session::put('code', $code);
            $this->sendOtp($mobile, $code);

            return response()->json(['status' => 200, 'message' => $code]);
        }

        return response()->json(['status' => 201, 'message' => 'شما قبلا ثبت نام کرده اید.']);
    }

    public function forget_sendCode(Request $request): JsonResponse {
        $userService = new UserService();
        $mobile = $request->mobile;
        if ($userService->checkExistsMobile($mobile)) {
            $code = $this->createCode();
            Session::put('code', $code);
            $this->sendOtp($mobile, $code);

            return response()->json(['status' => 200, 'message' => $code]);
        }

        return response()->json(['status' => 201, 'message' => 'شما ثبت نام نکرده اید.']);
    }

    public function validateCode(Request $request) {
        $code = Session::get('code', null);
        if ($code != null) {
            if ($code == $request->code) {
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 201]);
            }
        } else {
            return response()->json(['status' => 202]);
        }
    }

    private function createCode(): int {
        return rand(1000, 9999);
    }

    public function register(Request $request) {
        $userService = new UserService();
        $mobile = substr($request->mobile, 1, strlen($request->mobile));
        $data = [
            'name' => $request->name,
            'family' => $request->family,
            'mobile' => $request->mobile,
            'password' => bcrypt($mobile),
            'unique_code' => 'BKH-'.$mobile,
            'user_type_id' => 1,
            'register_user_id' => 1,
        ];
        $result = ['status' => 200, 'message' => '* ثبت نام شد ، رمزعبورتان ، همان شماره تلفن همراهتان بدون صفر است.'];
        if (! $userService->create($data)) {
            $result = ['status' => 201, 'message' => 'خطا در ایجاد کاربر.'];
        }

        Session::put('status', $result);

        return redirect(route('login'));
    }

    public function reserPassword(Request $request) {
        if ($request->password == $request->confirm_password) {
            $userService = new UserService();
            if ($userService->resetPassword($request->mobile, $request->password)) {
                return redirect(route('login'))->with('status', ['status' => 200, 'message' => 'رمزعبور باموفقیت بازنشانی شد .']);
            } else {
                return redirect(route('login'))->with('status', ['status' => 201, 'message' => 'خطا در بازنشانی رمزعبور ، مجددا تلاش کنید!']);
            }
        } else {
            return redirect()->back()->with('status', ['status' => 202, 'message' => 'تکرار رمزعبور صحیح نیست .']);
        }
    }

    private function sendOtp($number, $code) {
        $endpoint = 'https://api.kavenegar.com/v1/'.config('kavenegar.apikey').'/verify/lookup.json';
        $client = new Client();
        $receptor = $number;
        $token = $code;
        $template = 'VerifyBkh';
        $response = $client->request('GET', $endpoint, ['query' => [
            'receptor' => $receptor,
            'token' => $token,
            'template' => $template,
        ]]);

        return $response->getStatusCode();
        //        return $statusCode;
        //        $content = $response->getBody() . "";
        //        $res = json_decode($content, true)['return']['status'];
        //        return $res;

        //        if ($content == '200')
        //            return true;
        //        else
        //            return false;
    }
}
