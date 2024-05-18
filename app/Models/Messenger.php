<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Messenger
 *
 * @property int $id
 * @property int $driver_user_id
 * @property string $car
 * @property string $engine_number
 * @property int $car_type
 * @property string $plates_number
 * @property string $driver_nationalCode
 * @property string $end_insurance_date
 * @property string $end_exam_date
 * @property string $color
 * @property int $status
 * @property string $start_contract_date
 * @property string $end_contract_date
 * @property string $driver_pic
 * @property string $contract_file
 * @property string $insurance_file
 * @property string $exam_file
 * @property string $card_file
 * @property int $isActive
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger query()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCarType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCardFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereContractFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereDriverNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereDriverPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereDriverUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEndContractDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEndExamDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEndInsuranceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEngineNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereExamFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereInsuranceFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger wherePlatesNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereStartContractDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Messenger extends Model {
    use HasFactory;
}
