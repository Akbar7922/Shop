<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property float $price
 * @property string $reference_code
 * @property int|null $status_code
 * @property string|null $status_text
 * @property string|null $referenceID
 * @property int $status_id
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $for_payments_id
 * @property string $trackingCode
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereForPaymentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReferenceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReferenceID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatusText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transaction withoutTrashed()
 * @property int $order_id
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOrderId($value)
 * @mixin \Eloquent
 */
class Transaction extends Model {
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'order_id',
        'price',
        'reference_code',
        'status_id',
        'register_user_id',
        'trackingCode',
        'for_payments_id',
        'description',
        'status_code',
        'status_text',
        'referenceID',
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
