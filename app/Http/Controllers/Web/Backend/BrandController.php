<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->paginate();
        return view('backend.brands.index', compact(['brands']));
    }

    public function destroy($slug)
    {
        if ($this->brandService->haveProducts($slug))
            return response()->json(['status' => 202, 'message' => 'این برند دارای محصول میباشد و نمیتوان آن را حذف نمود!']);
        if ($this->brandService->delete($slug))
            return response()->json(['status' => 200, 'message' => 'برند باموفقیت حذف شد .']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف برند .']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_brand_id' => 'required|integer',
        ]);
        $validator->customMessages = [
            'name.required' => 'نام اجباری است.',
            'parent_brand_id.required' => 'دسته والد اجباری است',
            'parent_brand_id.integer' => 'مقدار دسته والد نامعتبر است',
        ];

        if ($validator->errors()->count() > 0) {
            return redirect()->back()->with('status', ['status' => 202, 'message' => $validator->errors()]);
        }

        if (($brand_id = $this->brandService->create($request->all())) > 0) {
            if ($request->has('pic')) {
                $image = $request->file('pic');
                $image_path = public_path('image/brands/');
                $image->move($image_path, $brand_id . '.png');
            }

            return redirect()->back()->with('status', ['status' => 200, 'message' => 'برند باموفقیت افزوده شد.']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ثبت برند ، مجددا تلاش کنید.']);
    }

    public function update($slug, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_brand_id' => 'required|integer',
        ]);
        $validator->customMessages = [
            'name.required' => 'نام اجباری است.',
            'parent_brand_id.required' => 'دسته والد اجباری است',
            'parent_brand_id.integer' => 'مقدار دسته والد نامعتبر است',
        ];

        if ($validator->errors()->count() > 0) {
            return redirect()->back()->with('status', ['status' => 202, 'message' => $validator->errors()]);
        }

        if (($brand_id = $this->brandService->update($request->all(), $slug)) > 0) {
            if ($request->has('pic')) {
                $image = $request->file('pic');
                $image_path = public_path('image/brands/');
                if (file_exists($image_path . $brand_id . '.png'))
                    unlink($image_path . $brand_id . '.png');
                $image->move($image_path, $brand_id . '.png');
            }

            return redirect()->back()->with('status', ['status' => 200, 'message' => 'برند باموفقیت ویرایش شد.']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش برند ، مجددا تلاش کنید.']);
    }

    public function getBrands()
    {
        return $this->brandService->all();
    }

    public function search(Request $request)
    {
        $brands = $this->brandService->search($request->word);
        return view('backend.brands.partial', compact('brands'));
    }
}
