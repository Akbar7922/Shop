<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VideoService;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    private $videoService;
    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoes = $this->videoService->all();
        return view('backend.videoes.index', compact('videoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'video' => 'required|file'
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data['title'] = $request->title;
        if ($request->has('video')) {
            $file = $request->file('video');
            $file_path = public_path('/video');
            $fileName = 'video_' . time() . '.png';
            $file->move($file_path, $fileName);
            $data['video'] = $fileName;
        }

        if ($this->videoService->create($data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'ویدیو باموفقیت افزوده شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در درج ویدیو ، مجددا تلاش کنید.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $video = $this->videoService->find($id);
        $data['title'] = $request->title;
        if ($request->has('video')) {
            $file_path = public_path('/video');
            if (file_exists($file_path . '/' . $video->video))
                unlink($file_path . '/' . $video->video);
            $file = $request->file('video');
            $fileName = 'video_' . time() . '.png';
            $file->move($file_path, $fileName);
            $data['video'] = $fileName;
        }

        if ($this->videoService->update($id, $data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'ویدیو باموفقیت ویرایش شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش ویدیو ، مجددا تلاش کنید.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = $this->videoService->find($id);
        $image_path = public_path('/video');
        if ($this->videoService->delete($id)) {
            if (file_exists($image_path . '/' . $video->video))
                unlink($image_path . '/' . $video->video);
            return response()->json(['status' => 200, 'message' => 'رکورد باموفقیت حذف شد.']);
        }
        return response()->json(['status' => 201, 'message' => 'خطا در حذف رکورد ، مجددا تلاش کنید.']);
    }

    public function search(Request $request){
        $videoes = $this->videoService->search($request->word);
        return view('backend.videoes.partial' , compact('videoes'));
    }
}
