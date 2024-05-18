<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\City|null $city
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job withoutTrashed()
 * @mixin \Eloquent
 */
class Job extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name' , 'city_id' , 'description'];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
