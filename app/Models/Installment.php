<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Installment
 *
 * @property int $id
 * @property float $price
 * @property int $order_id
 * @property string $due_date
 * @property int $status
 * @property int $transaction_id
 * @property string $barcode
 * @property string $description
 * @property int $register_user_id
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Transaction|null $transaction
 * @method static \Illuminate\Database\Eloquent\Builder|Installment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Installment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Installment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Installment extends Model {
    use HasFactory;

    protected $fillable = ['order_id', 'transaction_id', 'price', 'due_date',
        'status', 'barcode', 'description', 'register_user_id'];

    public $timestamps;

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
