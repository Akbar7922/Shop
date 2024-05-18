<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string $title
 * @property int $section
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket withoutTrashed()
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', 'section', 'status' , 'user_id' , 'receiver_id' , 'tracking_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function receiver()
    {
        return $this->belongsTo(User::class , 'receiver_id');
    }
    public function getSection()
    {
        switch ($this->section){
            case '0' :
                return 'مالی';
                break;
            case '1' :
                return 'سفارشات';
                break;
            case '2' :
                return 'پشتیبانی فنی';
                break;
            case '3' :
                return 'سایر';
                break;
        }
    }
    public function getStatus()
    {
        return ($this->status == 0) ? 'باز' : 'بسته';
    }

    public function getCreatedAtAttribute($value)
    {
        return verta($value);
    }
}
