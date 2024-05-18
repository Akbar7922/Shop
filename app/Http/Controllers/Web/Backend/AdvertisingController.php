<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\AdvertisingService;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Validator;

class AdvertisingController extends Controller
{
    private $advertisingService;
    public function __construct(AdvertisingService $advertisingService)
    {
        $this->advertisingService = $advertisingService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisings = $this->advertisingService->all();
        return view('backend.advertisings.index', compact('advertisings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.advertisings.create');
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
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
            'pic' => 'required|file'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data = [
            'title' => $request->title,
            'start_date' => Verta::parse($request->start_date . ' ' . $request->start_time)->toCarbon(),
            'end_date' => Verta::parse($request->end_date . ' ' . $request->end_time)->toCarbon(),
        ];

        if ($request->has('pic')) {
            $image = $request->file('pic');
            $image_path = public_path('image/advertisings/slider/');
            $imageName = 'slider_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($image_path, $imageName);
            $data['pic'] = $imageName;
        }

        if ($this->advertisingService->create($data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'تبلیغات باموفقیت اضافه شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در افزودن تبلیغات ، مجددا تلاش کنید.']);
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
        $advertising = $this->advertisingService->find($id);
        return view('backend.advertisings.edit', compact('advertising'));
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
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $advertising = $this->advertisingService->find($id);
        $data = [
            'title' => $request->title,
            'start_date' => Verta::parse($request->start_date . ' ' . $request->start_time)->toCarbon(),
            'end_date' => Verta::parse($request->end_date . ' ' . $request->end_time)->toCarbon(),
        ];

        if ($request->has('pic')) {
            $image = $request->file('pic');
            $image_path = public_path('image/advertisings/slider/');
            $imageName = 'slider_' . time() . '.' . $image->getClientOriginalExtension();
            if (file_exists($image_path . $advertising->pic))
                unlink($image_path . $advertising->pic);
            $image->move($image_path, $imageName);
            $data['pic'] = $imageName;
        }

        if ($this->advertisingService->update($id , $data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'تبلیغات باموفقیت ویرایش شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش تبلیغات ، مجددا تلاش کنید.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->advertisingService->delete($id))
            return response()->json(['status' => 200, 'message' => 'رکورد باموفقیت حذف شد.']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف رکورد ، مجددا تلاش کنید !']);
    }

    public function search(Request $request)
    {
        $advertisings = $this->advertisingService->search($request->word);
        return view('backend.advertisings.partial', compact('advertisings'));
    }

    // private function createTimeStamp($string){
    //     return Verta::create
    // }
}
