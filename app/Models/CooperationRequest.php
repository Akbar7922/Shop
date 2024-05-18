<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CooperationRequest
 *
 * @property int $id
 * @property int $city_id
 * @property int $job_id
 * @property int $is_male
 * @property string $national_code
 * @property string|null $birthday_year
 * @property string $fullName
 * @property int $is_married
 * @property int $degreeOfEducation
 * @property string $fieldOfStudy
 * @property string $university_name
 * @property string $tell
 * @property string $mobile
 * @property string $address
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $tracking_code
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Job|null $job
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereBirthdayYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereDegreeOfEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereFieldOfStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereIsMale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereIsMarried($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereUniversityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest withoutTrashed()
 * @mixin \Eloquent
 */
class CooperationRequest extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'job_id', 'city_id', 'is_male', 'national_code', 'birthday_year', 'fullName', 'is_married', 'degreeOfEducation', 'fieldOfStudy', 'university_name', 'tell', 'mobile', 'address', 'description', 'status', 'tracking_code'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return verta($value)->formatDatetime();
    }

    public function gender()
    {
        return ($this->is_male == 0) ? 'خانم' : 'آقا';
    }
    public function maritalStatus()
    {
        return ($this->is_married == 0) ? 'مجرد' : 'متاهل';
    }

    public function getDegreeOfEducation()
    {
        switch ($this->degreeOfEducation) {
            case 0:
                return 'بیسواد';
                break;
            case 1:
                return 'سیکل';
                break;
            case 2:
                return 'دیپلم';
                break;
            case 3:
                return 'کاردانی';
                break;
            case 4:
                return 'کارشناسی';
                break;
            case 5:
                return 'کارشناسی ارشد';
                break;
            case 6:
                return 'دکتری';
                break;
        }
    }
}
