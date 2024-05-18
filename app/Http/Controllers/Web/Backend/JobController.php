<?php

namespace App\Http\Controllers\Web\Backend;

use App\Services\JobService;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    private $jobService;
    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityService = new CityService();
        $jobs = $this->jobService->all();
        $states = $cityService->getStates();
        return view('backend.jobs.index', compact('jobs', 'states'));
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
            'name' => 'required|string',
            'city_id' => 'required|integer',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data = [
            'name' => $request->name,
            'city_id' => $request->city_id
        ];

        if ($this->jobService->create($data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'شغل باموفقیت اضافه شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در افزودن شغل ، مجددا تلاش کنید.']);

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
            'name' => 'required|string',
            'city_id' => 'required|integer',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data = [
            'name' => $request->name,
            'city_id' => $request->city_id
        ];

        if ($this->jobService->update($id , $data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'شغل باموفقیت بروزرسانی شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در بروزرسانی شغل ، مجددا تلاش کنید.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->jobService->delete($id))
            return response()->json(['status' => 200, 'message' => 'شغل موردنظر باموفقیت حذف شد.']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف شغل ، مجددا تلاش کنید.']);
    }

    public function search(Request $request)
    {
        $jobs = $this->jobService->search($request->word);
        return view('backend.jobs.partial', compact('jobs'));
    }
}
