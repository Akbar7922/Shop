<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MessageStatus
 *
 * @property int $id
 * @property string $name
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MessageStatus extends Model {
    use HasFactory;
}
