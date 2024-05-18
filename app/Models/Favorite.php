<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Favorite
 *
 * @property int $id
 * @property int $shop_product_id
 * @property int $category_id
 * @property int $brand_id
 * @property int $entity_type
 * @property int $user_id
 * @property int $register_user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUserId($value)
 * @mixin \Eloquent
 */
class Favorite extends Model {
    use HasFactory;

    protected $fillable = [
        'shop_product_id', 'category_id', 'brand_id', 'entity_type', 'user_id', 'register_user_id', 'isDel',
    ];

    public function shopProduct() {
        return $this->belongsTo(ShopProduct::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
