<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\BrandService;
use App\Services\ProductService;
use App\Services\ShopProductService;
use App\Services\ShopService;
use App\Services\UnitService;
use Auth;
use Illuminate\Http\Request;

class ShopProductController extends Controller {
    protected ShopProductService $shopProductService;

    public function __construct(ShopProductService $shopProductService) {
        $this->shopProductService = $shopProductService;
    }

    public function index() {
        $shopProducts = $this->shopProductService->all();

        return view('backend.shop_products.index', compact(['shopProducts']));
    }

    public function create() {
        $productService = new ProductService();
        $shopService = new ShopService();
        $brandService = new BrandService();
        $unitService = new UnitService();
        $shops = $shopService->all();
        $brands = $brandService->all();
        $products = $productService->allArray();
        $units = $unitService->all();

        return view('backend.shop_products.create', compact(['shops', 'brands', 'products', 'units']));
    }

    public function store(Request $request) {
        $request->request->set('price', str_replace(',', '', $request->price));
        $request->request->set('discounted_price', str_replace(',', '', $request->discounted_price));

        $validator = \Validator::make($request->all(), [
            'price' => 'required|integer',
            'discounted_price' => 'required|integer',
            'count' => 'required|integer',
        ]);
        $validator->customMessages = [
            'price' => 'قیمت نامعتبر است.',
            'discounted_price' => 'قیمت باتخفیف نامعتبر است.',
            'count' => 'مقدار موجودی نامعتبر است.',
        ];

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $request->request->add(['register_user_id' => Auth::id()]);
        $request->request->add(['pictures' => '[]']);

        if ($this->shopProductService->create($request->all())) {
            return redirect(route('shopProduct.index'))->with('status', ['status' => 200, 'message' => 'کالا باموفقیت ثبت شد.']);
        }

        return redirect(route('shopProduct.index'))->with('status', ['status' => 201, 'message' => 'خطا در ثبت کالا !']);
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

    public function edit($id) {
        $productService = new ProductService();
        $shopService = new ShopService();
        $brandService = new BrandService();
        $unitService = new UnitService();
        $shops = $shopService->all();
        $brands = $brandService->all();
        $products = $productService->allArray();
        $units = $unitService->all();
        $shopProduct = $this->shopProductService->find($id);

        return view('backend.shop_products.edit', compact(['shopProduct', 'shops', 'brands', 'products', 'units']));
    }

    public function update(Request $request, $id) {
        $request->request->set('price', str_replace(',', '', $request->price));
        $request->request->set('discounted_price', str_replace(',', '', $request->discounted_price));

        $validator = \Validator::make($request->all(), [
            'price' => 'required|integer',
            'discounted_price' => 'required|integer',
            'count' => 'required|integer',
        ]);
        $validator->customMessages = [
            'price' => 'قیمت نامعتبر است.',
            'discounted_price' => 'قیمت باتخفیف نامعتبر است.',
            'count' => 'مقدار موجودی نامعتبر است.',
        ];

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $request->request->add(['register_user_id' => Auth::id()]);
        $request->request->remove('_token');
        $request->request->remove('_method');

        if ($this->shopProductService->update($id, $request->all())) {
            return redirect(route('shopProduct.index'))->with('status', ['status' => 200, 'message' => 'کالا باموفقیت ویرایش شد.']);
        }

        return redirect(route('shopProduct.index'))->with('status', ['status' => 201, 'message' => 'خطا در ویرایش کالا !']);
    }

    public function destroy($id) {
        if ($this->shopProductService->delete($id)) {
            return response()->json(['status' => 200, 'message' => 'کالا باموفقیت حذف شد .']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف کالا .']);
    }

    public function storePictures($id, Request $request) {
        if ($image = $request->file('file')) {
            $product = $this->shopProductService->find($id);
            $pictures = json_decode($product->pictures);
            $extension = $request->file('file')->extension();
            if (count($pictures) == 0) {
                $fileName = $id.'_0.'.$extension;
            } else {
                $previousPicName = $pictures[count($pictures) - 1]->picture;
                $withoutExtension = explode('.', $previousPicName)[0];
                $previousIndex = substr($withoutExtension, strlen($withoutExtension) - 1, 1);
                $fileName = $id.'_'.($previousIndex + 1).'.'.$extension;
            }

            $image_path = public_path().'/image/shop_product/'.$id.'/';
            $pictures[] = ['picture' => $fileName];
            if ($this->shopProductService->update($id, ['pictures' => json_encode($pictures)])) {
                return $image->move($image_path, $fileName);

                return response()->json(['status' => 200, 'message' => 'تصویر باموفقیت افزوده شد .']);
            }

            return response()->json(['status' => 201, 'message' => 'خطا در افزودن تصویر .']);
        }
    }

    public function deleteProductPic($id, Request $request) {
        $shopProduct = $this->shopProductService->find($id);
        $pictures = json_decode($shopProduct->pictures);
        $file_path = public_path().'/image/shop_product/'.$pictures[$request->position]->picture;
        unset($pictures[$request->position]);
        if ($this->shopProductService->update($id, ['pictures' => json_encode($pictures)])) {
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            return response()->json(['status' => 200, 'message' => 'تصویر باموفقیت حذف شد.']);
        }

        return response()->json(['status' => 201, 'message' => 'خطا در حذف تصویر ، مجددا تلاش کنید !']);
    }

    public function getShopProducts() {
        return $this->shopProductService->getShopProductsOfManager(Auth::user()->user_type_id, Auth::id());
    }

    public function search(Request $request){
        $shopProducts = $this->shopProductService->search($request->word);
        return view('backend.shop_products.partial' , compact('shopProducts'));
    }
}
