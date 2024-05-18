<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CallInformation
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $tell
 * @property string $mobile
 * @property string|null $email
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CallInformation extends Model
{
    use HasFactory;
}
