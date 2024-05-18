<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Condition
 *
 * @property int $id
 * @property int $job_id
 * @property string $text
 * @property int $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Job|null $job
 * @method static \Illuminate\Database\Eloquent\Builder|Condition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Condition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Condition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Condition extends Model
{
    use HasFactory;

    protected $fillable = ['job_id' , 'text' , 'type' , 'description'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function getType()
    {
        switch ($this->type) {
            case 0:
                return 'شرایط حقوقی و ساعت کاری';
                break;
            case 1:
                return 'شرایط استخدامی';
                break;
            case 2:
                return 'مدارک موردنیاز';
                break;
        }
    }
}
