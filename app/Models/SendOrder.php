<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendOrder
 *
 * @property int $id
 * @property int $order_id
 * @property int $messenger_id
 * @property float $send_price
 * @property string $send_date
 * @property string $receive_date
 * @property int $order_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereMessengerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereReceiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereSendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereSendPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'messenger_id', 'send_price', 'send_date', 'receive_date', 'order_status_id'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
