<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TransactionStatus.
 *
 * @package namespace App\Entities;
 */
class TransactionStatus extends Model implements Transformable
{
    use TransformableTrait;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'transaction_id',
        'status',
        'description'
    ];

    protected $table = 'transaction_statuses';

}
