<?php

namespace App\Models;

use Auth;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ShopProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $shop_id
 * @property int $brand_id
 * @property int $count
 * @property float $price
 * @property float|null $discounted_price
 * @property int $unit_id
 * @property string|null $company
 * @property int $isProduct
 * @property string $pictures
 * @property int $register_user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @property string $barcode
 * @property string|null $description
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Favorite|null $is_Favorite
 * @property-read \App\Models\Cart|null $is_inCart
 * @property-read \App\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShopProductProperty[] $properties
 * @property-read int|null $properties_count
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereDiscountedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereIsProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Discount|null $discounts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @property-read int|null $rates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopOrderProduct> $sales
 * @property-read int|null $sales_count
 * @property-read \App\Models\Unit $unit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Log> $visits
 * @property-read int|null $visits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopOrderProduct> $sales
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Log> $visits
 * @mixin \Eloquent
 */
class ShopProduct extends Model {
    use HasFactory , SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'product_id',
        'shop_id',
        'brand_id',
        'count',
        'price',
        'discounted_price',
        'unit_id',
        'company',
        'isProduct',
        'pictures',
        'register_user_id',
        'slug',
        'barcode',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function shop() {
        return $this->belongsTo(Shop::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function properties() {
        return $this->hasMany(ShopProductProperty::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function discounts() {
        return $this->hasOne(Discount::class);
    }

    public function getPrice() {
        $discount = $this->discounts()->where('user_id', Auth::id())->first();
        if ($discount) {
            if ($discount->discount_price > 0) {
                return $this->price - $discount->discount_price;
            } elseif ($discount->discount_percentage > 0) {
                return $this->price - (($this->price * $discount->discount_percentage) / 100);
            }
        }
    }

    public function type() {
        if ($this->isProduct) {
            return 'کالا';
        }

        return 'خدمات';
    }

    public function visits() {
        return $this->hasMany(Log::class, 'entity_id')
            ->where('activity_id', 5)
            ->distinct(['user_id', 'ip_address']);
    }

    public function rates() {
        return $this->hasMany(ShopProductsRate::class, 'shop_product_id');
    }

    public function sales() {
        return $this->hasMany(ShopOrderProduct::class, 'shop_product_id')
            ->distinct('register_user_id');
    }

    public function is_inCart() {
        return $this->hasOne(Cart::class)->where('user_id', Auth::id());
    }

    public function is_Favorite() {
        return $this->hasOne(Favorite::class)->where('user_id', Auth::id());
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => ['product.name', 'shop.name'],
            ],
        ];
    }
}
