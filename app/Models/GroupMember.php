<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\GroupMember
 *
 * @property int $id
 * @property int $group_id
 * @property int $user_id
 * @property int $isAdmin
 * @property int $isActive
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Group|null $group
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember withoutTrashed()
 * @mixin \Eloquent
 */
class GroupMember extends Model {
    use HasFactory , SoftDeletes;

    protected $fillable = ['user_id' , 'group_id'];

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
