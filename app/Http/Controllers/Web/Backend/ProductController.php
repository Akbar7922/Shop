<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller {
    protected ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function index() {
        $products = $this->productService->all();

        return view('backend.products.index', compact(['products']));
    }

    public function show($id) {
    }

    public function create() {
        $categoryService = new CategoryService();
        $categories = $categoryService->categories();

        return view('backend.products.create', compact(['categories']));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required|integer',
        ]);
        $validator->customMessages = [
            'name.required' => 'نام اجباری است.',
        ];
        if ($validator->errors()->count() > 0) {
            return redirect()->back()->with('status', ['status' => 202, 'message' => $validator->errors()]);
        }

        if ($this->productService->create($request->all())) {
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'محصول باموفقیت افزوده شد.']);
        }

        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ثبت محصول ، مجددا تلاش کنید.']);
    }

    public function edit($id) {
        $categoryService = new CategoryService();
        $product = $this->productService->find($id);
        $categories = $categoryService->categories();

        return view('backend.products.edit', compact(['product', 'categories']));
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required|integer',
        ]);
        $validator->customMessages = [
            'name.required' => 'نام اجباری است.',
        ];
        if ($validator->errors()->count() > 0) {
            return redirect()->back()->with('status', ['status' => 202, 'message' => $validator->errors()]);
        }

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->request->remove('avatar');
        $request->request->remove('avatar_remove');

        if ($this->productService->update($id, $request->all())) {
            return redirect(route('product.index'))->with('status', ['status' => 200, 'message' => 'محصول باموفقیت ویرایش شد.']);
        }

        return redirect(route('product.index'))->with('status', ['status' => 201, 'message' => 'خطا در ویرایش محصول ، مجددا تلاش کنید.']);
    }

    public function destroy($id) {
        if ($this->productService->delete($id)) {
            return response()->json(['status' => 200, 'message' => 'محصول باموفقیت حذف شد .']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف محصول .']);
    }

    public function search(Request $request){
        $products = $this->productService->search($request->word);
        return view('backend.products.partial' , compact('products'));
    }
}
