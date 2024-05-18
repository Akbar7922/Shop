<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\ConditionsService;
use Illuminate\Http\Request;
use Validator;

class ConditionController extends Controller
{
    private $conditionService;
    public function __construct(ConditionsService $conditionsService)
    {
        $this->conditionService = $conditionsService;
    }
    public function index($job_id)
    {
        $conditions = $this->conditionService->getJobConditins($job_id);
        return view('backend.jobs.conditions.index', compact('conditions'));
    }

    public function destroy($id)
    {
        if ($this->conditionService->delete($id))
            return response()->json(['status' => 200, 'message' => 'رکورد باموفقیت حذف شد.']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف رکورد ، مجددا تلاش کنید.']);
    }

    public function store($job_id , Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
            'type' => 'required|integer'
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data = [
            'job_id' => $job_id,
            'text' => $request->text,
            'type' => $request->type
        ];

        $condition = $this->conditionService->create($data);
        if ($condition)
            return response()->json(['status' => 200, 'message' => 'شغل باموفقیت بروزرسانی شد.' , 'data' => $condition]);
        return response()->json(['status' => 201, 'message' => 'خطا در بروزرسانی شغل ، مجددا تلاش کنید.']);
    }
}
