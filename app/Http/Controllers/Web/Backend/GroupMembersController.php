<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\GroupMembersService;
use Illuminate\Http\Request;

class GroupMembersController extends Controller
{
    private $groupMemberService;
    public function __construct(GroupMembersService $groupMemberService)
    {
        $this->groupMemberService = $groupMemberService;
    }
    public function addMembersToGroup($group_id, Request $request)
    {
        $status = [];
        foreach ($request->members_id as $member_id) {
            if (!$this->groupMemberService->checkGroupMember($group_id, $member_id))
                if ($this->groupMemberService->create(['group_id' => $group_id, 'user_id' => $member_id]))
                    $status[$member_id] = 1;
                else
                    $status[$member_id] = -1;
            else
                $status[$member_id] = 0;
        }
        if (!in_array(-1, $status))
            return response()->json(['status' => 200, 'message' => 'اعضا باموفقیت به گروه اضافه شدند..']);
        return response()->json(['status' => 201, 'message' => 'خطا در افزودن عضو مجددا تلاش کنید.']);
    }
}
