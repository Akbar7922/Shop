<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopOrder
 *
 * @property int $id
 * @property int $shop_id
 * @property float $price
 * @property int $middleMan_id
 * @property int $status_id
 * @property int $order_id
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Shop|null $shop
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShopOrderProduct[] $shopOrderProducts
 * @property-read int|null $shop_order_products_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereMiddleManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShopOrder extends Model {
    use HasFactory;

    protected $fillable = [
        'order_id',
        'shop_id',
        'price',
        'middleMan_id',
        'status_id',
        'register_user_id',
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function shop() {
        return $this->belongsTo(Shop::class);
    }

    public function shopOrderProducts() {
        return $this->hasMany(ShopOrderProduct::class);
    }
}
