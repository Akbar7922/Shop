<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\UserType;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\GroupService;
use App\Http\Controllers\Controller;
use App\Services\CityService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupsController extends Controller
{
    protected $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->groupService->paginate();
        // return $groups;
        return view('backend.groups.index', compact(['groups']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'isGroup' => 'required',
            'unique_name' => 'required',
        ]);
        $validator->customMessages = [
            'title.required' => 'نام گروه اجباری است.',
            'isGroup.required' => 'نوع اجباری است',
            'unique_name.required' => 'شناسه گروه اجباری است',
        ];

        if (!$validator->fails())
            if ($this->groupService->checkNameExists($request->unique_name, 0))
                $validator->errors()->add('unique_name', 'شناسه قبلا استفاده شده است.');

        if ($validator->errors()->count())
            return redirect()->back()->withErrors($validator)->withInput($request->input());

        $request->request->add(['register_user_id' => Auth::id()]);
        $request->request->add(['link' => 'https://market.bekhah.ir/groups/' . $request->unique_name]);
        if ($group = $this->groupService->create($request->all())) {
            if ($request->hasFile('pic')) {
                $image = $request->file('pic');
                $image_path = public_path('image\groups');
                if ($image->move($image_path, $group->id . '.png')) {
                    $group->fill(['pic' => $group->id . '.png']);
                    if ($group->save())
                        return redirect()->back()->with('status', ['status' => 200, 'message' => 'گروه باموفقیت ثبت شد.']);
                }
            }
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'گروه باموفقیت ثبت شد ، تصویر باموفقیت آپلود نشد.']);
        }
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ثبت گروه.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->groupService->find($id);
        return view('backend.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'isGroup' => 'required',
            'unique_name' => 'required',
        ]);
        $validator->customMessages = [
            'title.required' => 'نام گروه اجباری است.',
            'isGroup.required' => 'نوع اجباری است',
            'unique_name.required' => 'شناسه گروه اجباری است',
        ];

        if (!$validator->fails())
            if ($this->groupService->checkNameExists($request->unique_name, $id))
                $validator->errors()->add('unique_name', 'شناسه قبلا استفاده شده است.');

        if ($validator->errors()->count())
            return redirect()->back()->withErrors($validator)->withInput($request->input());

        $data = [
            'title' => $request->title,
            'isGroup' => $request->isGroup,
            'description' => $request->description,
            'link' => 'https://market.bekhah.ir/groups/' . $request->unique_name,
            'unique_name' => $request->unique_name
        ];
        if ($this->groupService->update($data, $id)) {
            if ($request->hasFile('pic')) {
                $image = $request->file('pic');
                $image_path = public_path('image\groups');
                if ($image->move($image_path, $id . '.png'))
                    return redirect()->back()->with('status', ['status' => 200, 'message' => 'گروه باموفقیت ویرایش شد.']);
            }
            return redirect()->back()->with('status', ['status' => 200, 'message' => 'گروه باموفقیت ثبت شد ، تصویر باموفقیت آپلود نشد.']);
        }
        return redirect()->back()->with('status', ['status' => 201, 'message' => 'خطا در ویرایش گروه.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($unique_name)
    {
        if ($this->groupService->deleteWithUniqueName($unique_name))
            return response()->json(['status' => 200, 'message' => 'گروه باموفقیت حذف شد .']);
        return response()->json(['status' => 200, 'message' => 'خطا در حذف گروه .']);
    }

    public function getGroups()
    {
        return $this->groupService->all();
    }

    public function checkUniqueName(Request $requset)
    {
        if (!$this->groupService->checkNameExists($requset->unique_name, $requset->group_id))
            return response()->json(['status' => 200, 'message' => 'این شناسه ، قابل استفاده است.']);
        return response()->json(['status' => 201, 'message' => 'این شناسه ، تکراری است.']);
    }

    public function members($id)
    {
        $userService = new UserService();
        $users = $userService->searchFilter(request()->get('type') , null , null);
        if (request()->ajax())
            return view('backend.groups.list', compact(['users']));
        else {
            $cityService = new CityService();
            $userTypes = UserType::all();
            $members = $this->groupService->find($id)->members;
            $group = $this->groupService->find($id);
            $states = $cityService->getStates();
            return view('backend.groups.members', compact(['users', 'members', 'id', 'group', 'userTypes', 'states']));
        }
    }
}
