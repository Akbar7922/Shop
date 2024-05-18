<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopProductProperty
 *
 * @property int $id
 * @property int $shop_product_id
 * @property int $property_id
 * @property string $value
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property $property
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereValue($value)
 * @mixin \Eloquent
 */
class ShopProductProperty extends Model {
    use HasFactory;

    public function shopProduct() {
        return $this->belongsTo(ShopProduct::class);
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }
}
