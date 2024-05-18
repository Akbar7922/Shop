<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PayType
 *
 * @property int $id
 * @property string $name
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $icon
 * @method static \Illuminate\Database\Eloquent\Builder|PayType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PayType extends Model {
    use HasFactory;

    public function description() {
        switch ($this->id) {
            case 1:
                return 'درگاه بانکی ';
                break;
            case 2:
                return number_format(Auth::user()->wallet, 0).' ریال ';
                break;
            case 3:
                return 'هنگام تحویل سفارش';
        }

        /*if ($this->id == 2)
            return number_format(Auth::user()->wallet , 0).' ریال ';
        return "  ";*/
    }
}
