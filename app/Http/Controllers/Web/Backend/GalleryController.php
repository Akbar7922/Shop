<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use Validator;

class GalleryController extends Controller
{
    private $galleryService;
    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = $this->galleryService->all();
        return view('backend.galleries.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'pic' => 'required|file'
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data['title'] = $request->title;
        if ($request->has('pic')) {
            $image = $request->file('pic');
            $image_path = public_path('/image/gallery/');
            $imageName = 'gallery_' . time() . '.png';
            $image->move($image_path, $imageName);
            $data['pics'] = $imageName;
        }

        if ($this->galleryService->create($data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'تصویر باموفقیت افزوده شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در درج تصویر ، مجددا تلاش کنید.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $gallery = $this->galleryService->find($id);
        $data['title'] = $request->title;
        if ($request->has('pic')) {
            $image_path = public_path('/image/gallery/');
            if (file_exists($image_path . '/' . $gallery->pics))
                unlink($image_path . '/' . $gallery->pics);
            $image = $request->file('pic');
            $imageName = 'gallery_' . time() . '.png';
            $image->move($image_path, $imageName);
            $data['pics'] = $imageName;
        }

        if ($this->galleryService->update($id, $data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'تصویر باموفقیت ویرایش شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش تصویر ، مجددا تلاش کنید.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = $this->galleryService->find($id);
        $image_path = public_path('/image/gallery/');
        if ($this->galleryService->delete($id)) {
            if (file_exists($image_path . '/' . $gallery->pics))
                unlink($image_path . '/' . $gallery->pics);
            return response()->json(['status' => 200, 'message' => 'رکورد باموفقیت حذف شد.']);
        }
        return response()->json(['status' => 201, 'message' => 'خطا در حذف رکورد ، مجددا تلاش کنید.']);
    }

    public function search(Request $request){
        $galleries = $this->galleryService->search($request->word);
        return view('backend.galleries.partial' , compact('galleries'));
    }
}
