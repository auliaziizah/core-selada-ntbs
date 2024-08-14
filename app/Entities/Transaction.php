<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Transactions.
 *
 * @package namespace App\Entities;
 */
class Transaction extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'service_id',
        'code',
        'merchant_id',
        'merchant_no',
        'price',
        'vendor_price',
        'note',
        'stan',
        'status',
        'payment_status'
    ];

    protected $table = 'transactions';

    public function merchant()
    {
        return $this->belongsTo(Merchant::class,'merchant_id','id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function transactionStatus()
    {
        return $this->hasMany(TransactionStatus::class,'transaction_id','id');
    }

    public function transactionPaymentStatus()
    {
        return $this->hasMany(TransactionPaymentStatus::class,'transaction_id','id');
    }
}
