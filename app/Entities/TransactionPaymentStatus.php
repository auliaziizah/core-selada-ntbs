<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TransactionPaymentStatus.
 *
 * @package namespace App\Entities;
 */
class TransactionPaymentStatus extends Model implements Transformable
{
    use TransformableTrait;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'transaction_id',
        'status',
        'description'
    ];

    protected $table = 'transaction_payment_statuses';

}
