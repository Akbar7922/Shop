<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property string $title
 * @property string $pics
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery wherePics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery withoutTrashed()
 * @mixin \Eloquent
 */
class Gallery extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['title' , 'pics'];
}
