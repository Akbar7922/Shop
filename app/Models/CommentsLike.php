<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CommentsLike
 *
 * @property int $id
 * @property int $comment_id
 * @property int $user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereUserId($value)
 * @mixin \Eloquent
 */
class CommentsLike extends Model {
    use HasFactory;
}
