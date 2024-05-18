<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendActivationCode
 *
 * @property int $id
 * @property string $activation_code
 * @property string $mobile
 * @property int $message_type
 * @property int $send_status
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereActivationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereMessageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereSendStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendActivationCode extends Model {
    use HasFactory;
}
