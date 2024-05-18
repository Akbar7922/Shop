<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MessagesLog
 *
 * @property int $id
 * @property int $message_id
 * @property int $user_id
 * @property int $message_status_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereMessageStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereUserId($value)
 * @mixin \Eloquent
 */
class MessagesLog extends Model {
    use HasFactory;
}
