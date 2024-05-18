<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopProductsRate
 *
 * @property int $id
 * @property int $user_id
 * @property int $shop_product_id
 * @property float $rate
 * @property string|null $comment
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereUserId($value)
 * @mixin \Eloquent
 */
class ShopProductsRate extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'shop_product_id', 'rate', 'comment', 'isActive'];
}
