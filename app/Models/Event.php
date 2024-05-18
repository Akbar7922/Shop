<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $event_date
 * @property int $type
 * @property string $pic
 * @property string|null $video
 * @property string|null $pictures
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event withoutTrashed()
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['title' , 'body' , 'type' , 'event_date' , 'pic'];

    public function getPicPath(){
        $path = ($this->type == 0) ? asset('/image/events/') : asset('/image/news/');
        return $path.'/'.$this->pic;
    }
    public function getPicPublicPath(){
        $path = ($this->type == 0) ? public_path('/image/events/') : public_path('/image/news/');
        return $path.'/'.$this->pic;
    }

    public function getEventDateAttribute($value)
    {
        return verta($value)->formatDatetime();
    }

    public function getFullTitle(){
        return ($this->type == 0) ? 'رویداد '.$this->title : 'خبر '.$this->title;
    }

    public function getEventDate(){
        return verta($this->event_date);
    }
}
