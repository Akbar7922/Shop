<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Config
 *
 * @property int $id
 * @property string $app_name
 * @property string $small_logo
 * @property string|null $large_logo
 * @property string|null $placeholder
 * @property string|null $main_color
 * @property string|null $tell
 * @property string $mobile
 * @property string $email
 * @property string|null $address
 * @property string|null $slogan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereAppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereLargeLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereMainColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config wherePlaceholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereSmallLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_name', 'small_logo', 'large_logo', 'slogan',
        'placeholder', 'main_color', 'tell', 'mobile', 'email', 'address'
    ];
}
