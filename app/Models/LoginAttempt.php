<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LoginAttempt
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $ip_address
 * @property string|null $mac_address
 * @property string|null $imei
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereUsername($value)
 * @mixin \Eloquent
 */
class LoginAttempt extends Model {
    use HasFactory;
}
