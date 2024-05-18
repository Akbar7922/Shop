<?php

namespace App\Http\Controllers\Web\Backend;

use Validator;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Services\ConfigService;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    private $configService;
    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }
    public function index()
    {
        $config = Config::find(1);
        return view('backend.config.index', compact('config'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_name' => 'required',
            'slogan' => 'required',
            'mobile' => 'required|min:11|max:11',
            'email' => 'required|email',
        ]);

        if ($validator->errors()->count() > 0)
            return redirect()->back()->with(['status' => $validator->errors()]);
        if ($request->hasFile('small_logo')) {
            $image = $request->file('small_logo');
            $image_path = public_path('image/icons/logo/');
            if (file_exists($image_path . 'small.png'))
                unlink($image_path . 'small.png');
            $image->move($image_path , 'small.png');
            $data['small_logo'] = 'small.png';
        }
        if ($request->hasFile('large_logo')) {
            $image = $request->file('large_logo');
            $image_path = public_path('image/icons/logo/');
            if (file_exists($image_path . 'large.png'))
                unlink($image_path . 'large.png');
            $image->move($image_path , 'large.png');
            $data['large_logo'] = 'large.png';
        }
        $data = [
            'id' => 1,
            'app_name' => $request->app_name,
            'tell' => $request->tell,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'slogan' => $request->slogan,
            'address' => $request->address,
            'placeholder' => $request->placeholder
        ];
        if ($this->configService->create($data))
            return redirect(route('config'))->with(['status' => ['status' => 200, 'message' => 'اطلاعات باموفقیت ذخیره شد.']]);
        return redirect(route('config'))->with(['status' => ['status' => 201, 'message' => 'خطا در ذخیره اطلاعات ، مجددا تلاش کنید.']]);
    }
}
