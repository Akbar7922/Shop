<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Advertising
 *
 * @property int $id
 * @property string $title
 * @property string $pic
 * @property string $link
 * @property string $start_date
 * @property string $end_date
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising withoutTrashed()
 * @mixin \Eloquent
 */
class Advertising extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'pic', 'link', 'start_date', 'end_date', 'isActive'
    ];

    public function getStartDateTime()
    {
        return verta($this->start_date);
    }
    public function getEndDateTime()
    {
        return verta($this->end_date);
    }
    public function getStartDate()
    {
        return verta($this->start_date)->formatDate();
    }
    public function getEndDate()
    {
        return verta($this->end_date)->formatDate();
    }
    public function getStartTime()
    {
        return verta($this->start_date)->format('H:i');
    }
    public function getEndTime()
    {
        return verta($this->end_date)->format('H:i');
    }
}
