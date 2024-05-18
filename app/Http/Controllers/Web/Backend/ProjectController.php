<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    private $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->projectService->all();
        return view('backend.projects.index', compact('projects'));
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
            'description' => 'nullable|string',
            'pic' => 'required|file'
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $data['title'] = $request->title;
        $data['description'] = $request->description;
        if ($request->has('pic')) {
            $image = $request->file('pic');
            $image_path = public_path('/image/projects/');
            $imageName = 'project_' . time() . '.png';
            $image->move($image_path, $imageName);
            $data['pic'] = $imageName;
        }

        if ($this->projectService->create($data))
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
            'description' => 'nullable|string',
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors());

        $project = $this->projectService->find($id);
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        if ($request->has('pic')) {
            $image_path = public_path('/image/projects/');
            if (file_exists($image_path . '/' . $project->pic))
                unlink($image_path . '/' . $project->pic);
            $image = $request->file('pic');
            $imageName = 'project_' . time() . '.png';
            $image->move($image_path, $imageName);
            $data['pic'] = $imageName;
        }

        if ($this->projectService->update($id, $data))
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'رکورد باموفقیت ویرایش شد.']);
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش رکورد ، مجددا تلاش کنید.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->projectService->delete($id))
            return response()->json(['status' => 200, 'message' => 'رکورد باموفقیت حذف شد.']);
        return response()->json(['status' => 201, 'message' => 'خطا در حذف رکورد ، مجددا تلاش کنید .']);
    }

    public function search(Request $request){
        $projects = $this->projectService->search($request->word);
        return view('backend.projects.partial' , compact('projects'));
    }
}
