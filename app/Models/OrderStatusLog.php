<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderStatusLog
 *
 * @property int $id
 * @property int $order_id
 * @property int $order_status_id
 * @property int $register_user_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderStatusLog extends Model {
    use HasFactory;
    protected $fillable = ['order_id' , 'order_status_id','register_user_id' , 'description'];
}
