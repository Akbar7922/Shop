<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Log
 *
 * @property int $id
 * @property int $activity_id
 * @property int $user_id
 * @property string $ip_address
 * @property int $platform
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUserId($value)
 * @property int $entity_id
 * @property-read \App\Models\Activity $activity
 * @property-read \App\Models\ShopProduct|null $shopProductEntity
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereEntityId($value)
 * @mixin \Eloquent
 */
class Log extends Model {
    use HasFactory;

    protected $fillable = ['activity_id', 'entity_id', 'user_id',
        'ip_address', 'platform', 'description'];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function shopProductEntity() {
        return $this->belongsTo(ShopProduct::class, 'entity_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
