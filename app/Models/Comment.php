<?php

namespace App\Models;

use App\Models\Comment as ModelsComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $shop_product_id
 * @property int $comment_parent_id
 * @property string $comment
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Comment $parent
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment withoutTrashed()
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['user_id', 'shop_product_id', 'comment_parent_id', 'comment','isActive'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shopProduct()
    {
        return $this->belongsTo(ShopProduct::class);
    }
    public function parent()
    {
        return $this->belongsTo(ModelsComment::class , 'comment_parent_id');
    }

    public function getStatus()
    {
        if ($this->isActive)
            return 'درحال نمایش';
        return 'مخفی';
    }

    public function changeStatusText()
    {
        if ($this->isActive)
            return 'مخفی';
        return 'قابل نمایش';
    }

    public function getParent()
    {
        if ($this->comment_parent_id == 1)
            return 'فاقد والد';
        return $this->parent->comment;
    }

    public function created_at()
    {
        return verta($this->created_at);
    }

    public function getComment(){
        return substr($this->comment , 0 , 50).' ...';
    }
}
