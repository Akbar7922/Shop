<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendType
 *
 * @property int $id
 * @property string $name
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $base_cost
 * @method static \Illuminate\Database\Eloquent\Builder|SendType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereBaseCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendType extends Model {
    use HasFactory;
}
