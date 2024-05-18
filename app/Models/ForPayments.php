<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ForPayments
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ForPayments extends Model {
    use HasFactory;
}
