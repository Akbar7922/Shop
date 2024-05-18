<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $body
 * @property int $sender_user_id
 * @property int $reciver_user_id
 * @property int $receiver_type
 * @property int $message_parent_id
 * @property int $message_type
 * @property int $isNotification
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReceiverType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReciverUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSenderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Message extends Model {
    use HasFactory;
}
