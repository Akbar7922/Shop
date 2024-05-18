<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property float $price
 * @property float $send_price
 * @property int $send_type_id
 * @property int $pay_type_id
 * @property string $tracking_code
 * @property string $address
 * @property float $latitude
 * @property float $longitude
 * @property int $status_id
 * @property int $payment_status
 * @property int $isActive
 * @property int $register_user_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $city_id
 * @property int|null $transaction_id
 * @property int $installments
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\PayType $payType
 * @property-read \App\Models\SendType $sendType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShopOrder[] $shopOrder
 * @property-read int|null $shop_order_count
 * @property-read \App\Models\OrderStatus $status
 * @property-read \App\Models\Transaction|null $transaction
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereInstallments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSendPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSendTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @property-read \App\Models\Status|null $paymentStatus
 * @property-read \App\Models\User|null $user
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price',
        'send_price',
        'send_type_id',
        'pay_type_id',
        'tracking_code',
        'address',
        'latitude',
        'longitude',
        'status_id',
        'payment_status',
        'isActive',
        'register_user_id',
        'description',
        'city_id',
        'transaction_id',
        'installments',
    ];

    protected $timestamp = true;

    public function shopOrder()
    {
        return $this->hasMany(ShopOrder::class, 'order_id');
    }

    public function payType()
    {
        return $this->belongsTo(PayType::class);
    }

    public function sendType()
    {
        return $this->belongsTo(SendType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function paymentStatus()
    {
        return $this->belongsTo(Status::class, 'payment_status');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getChangeStatusTitle()
    {
        switch ($this->status_id) {
            case 1:
                if ($this->pay_type_id == 3)
                    return 'تایید';
                return 'وضعیت : ' . $this->status->name;
                break;
            case 2:
                return 'تایید';
                break;
            case 3:
                return 'تکمیل آماده سازی';
                break;
            case 4:
                return 'تحویل به پیک';
                break;
            default:
                return 'وضعیت : ' . $this->status->name;
                break;
        }
    }

    public function getCreatedAtAttribute()
    {
        return verta($this->attributes['created_at'], 'Asia/Tehran');
    }
}
