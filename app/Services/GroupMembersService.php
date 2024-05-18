<?php

namespace App\Services;

use App\Models\GroupMember;
use Illuminate\Database\QueryException;

class GroupMembersService {
    public function membersOfGroup($group_id) {
        return GroupMember::where('group_id', $group_id)->get();
    }

    public function create($data){
        try {
            GroupMember::create($data);
            return true;
        } catch (QueryException $exception) {
            return false;
        }
    }

    public function checkGroupMember($group_id, $member_id){
        return GroupMember::whereGroupId($group_id)->whereUserId($member_id)->exists();
    }
}
