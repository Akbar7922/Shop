<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Discount
 *
 * @property int $id
 * @property int $shop_id
 * @property int $shop_product_id
 * @property int $category_id
 * @property int $brand_id
 * @property float $discount_price
 * @property float $discount_percentage
 * @property int $user_id
 * @property int $group_id
 * @property string $start_date
 * @property string $end_date
 * @property string $discount_code
 * @property int $isActive
 * @property int $register_user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount query()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDiscountCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Group|null $group
 * @property-read \App\Models\Shop|null $shop
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Discount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount withoutTrashed()
 * @mixin \Eloquent
 */
class Discount extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shop_id', 'shop_product_id', 'category_id', 'brand_id', 'discount_price', 'discount_percentage',
        'user_id', 'group_id', 'start_date', 'end_date', 'discount_code', 'isActive', 'register_user_id', 'isDel',
    ];

    public function getType() {
        if ($this->shop_id > 0) {
            return 'فروشگاه';
        }
        if ($this->shop_product_id > 0) {
            return 'محصول';
        }
        if ($this->category_id > 0) {
            return 'دسته بندی';
        }
        if ($this->brand_id > 0) {
            return 'برند';
        }
    }

    public function getEntity() {
        if ($this->shop_id > 0) {
            return $this->shop->name;
        }
        if ($this->shop_product_id > 0) {
            return $this->shopProduct->product->name;
        }
        if ($this->category_id > 0) {
            return $this->category->name;
        }
        if ($this->brand_id > 0) {
            return $this->brand->name;
        }
    }

    public function getForType() {
        if ($this->group_id > 0) {
            return 'گروه کاربری';
        }
        if ($this->user_id > 0) {
            return 'کاربرخاص';
        }
    }

    public function getFor() {
        if ($this->group_id > 0) {
            return $this->group->title;
        }
        if ($this->user_id > 0) {
            return $this->user->getFullName();
        }
    }

    public function getDiscount() {
        if ($this->discount_price == 0) {
            return $this->discount_percentage.' درصد';
        }

        return number_format($this->discount_price, 0, ',').' ريال';
    }

    public function calculateDiscount($price) {
        if ($this->discount_price == 0) {
            return $price - (($price * $this->discount_percentage) / 100);
        }

        return $price - $this->discount_price;
    }

    public function getStartDate() {
        return verta($this->start_date);
    }

    public function getEndDate() {
        return verta($this->end_date);
    }

    public function shop() {
        return $this->belongsTo(Shop::class);
    }

    public function shopProduct() {
        return $this->belongsTo(ShopProduct::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function userRegister() {
        return $this->belongsTo(User::class , 'register_user_id');
    }
}
