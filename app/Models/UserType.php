<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserType extends Model {
    use HasFactory;
}
