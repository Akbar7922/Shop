<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->paginate();
        return view('backend.categories.index', compact(['categories']));
    }

    public function destroy($slug)
    {
        if ($this->categoryService->haveProduct($slug))
            return response()->json(['status' => 202, 'message' => 'دسته بندی دارای محصول میباشد.']);

        $category_id = $this->categoryService->find($slug)->id;
        if ($this->categoryService->delete($slug)) {
            $image_path = public_path("image/categories/");
            $image_name = $category_id . '.png';
            if (file_exists($image_path . $image_name))
                unlink($image_path . $image_name);
            return response()->json(['status' => 200, 'message' => 'دسته بندی باموفقیت حذف شد .']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف دسته بندی .']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_cat_id' => 'required|integer',
        ]);
        $validator->customMessages = [
            'name.required' => 'نام اجباری است.',
            'parent_cat_id.required' => 'دسته والد اجباری است',
            'parent_cat_id.integer' => 'مقدار دسته والد نامعتبر است',
        ];

        if ($validator->errors()->count() > 0) {
            return redirect()->back()->with('status', ['status' => 202, 'message' => $validator->errors()]);
        }

        if (($category_id = $this->categoryService->create($request->all())) > 0) {
            if ($request->has('pic')) {
                $image = $request->file('pic');
                $image_path = public_path('image/categories/');
                $image->move($image_path, $category_id . '.png');
            }

            return redirect()->back()->with('status', ['status' => 200, 'message' => 'دسته بندی باموفقیت افزوده شد.']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ثبت دسته بندی ، مجددا تلاش کنید.']);
    }

    public function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_cat_id' => 'required|integer',
        ]);
        $validator->customMessages = [
            'name.required' => 'نام اجباری است.',
            'parent_cat_id.required' => 'دسته والد اجباری است',
            'parent_cat_id.integer' => 'مقدار دسته والد نامعتبر است',
        ];

        if ($validator->errors()->count() > 0) {
            return redirect()->back()->with('status', ['status' => 202, 'message' => $validator->errors()]);
        }

        if (($category_id = $this->categoryService->update($request->all(), $slug)) > 0) {
            if ($request->has('pic')) {
                $image = $request->file('pic');
                $image_path = public_path("image/categories/");
                $image_name = $category_id . '.png';
                // return $image_path;
                if (file_exists($image_path . $image_name)) {
                    unlink($image_path . $image_name);
                }
                $image->move($image_path, $image_name);
            }

            return redirect()->back()->with('status', ['status' => 200, 'message' => 'دسته بندی باموفقیت ویرایش شد.']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش دسته بندی ، مجددا تلاش کنید.']);
    }

    public function getCategories()
    {
        return $this->categoryService->categories();
    }

    public function search(Request $request)
    {
        $categories = $this->categoryService->search($request->word);
        return view('backend.categories.partial', compact('categories'));
    }
}
