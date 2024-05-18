<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $user_id
 * @property int $shop_product_id
 * @property int $count
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @property int $discount_id
 * @property-read \App\Models\Discount|null $discount
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDiscountId($value)
 * @mixin \Eloquent
 */
final class Cart extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'shop_product_id', 'count', 'discount_id', 'register_user_id'];

    public function shopProduct() {
        return $this->belongsTo(ShopProduct::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function discount() {
        return $this->belongsTo(Discount::class);
    }

    public function total() {
        if ($this->discount_id > 0 && $this->discount->isActive) {
            return $this->count * $this->discount->calculateDiscount($this->shopProduct->price);
        }
        return $this->count * $this->shopProduct->price;
    }

    public function getPrice() {
        if ($this->discount_id== 0) {
            return $this->shopProduct->price;
        }
        return $this->discount->calculateDiscount($this->shopProduct->price);
    }
}
