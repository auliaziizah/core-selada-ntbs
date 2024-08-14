<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class TransactionBJB.
 *
 * @package namespace App\Entities;
 */
class TransactionBJB extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $presenter = TransactionBJBPresenter::class;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'name',
        'transaction_name',
        'transaction_code',
        'product_name',
        'nominal',
        'fee',
        'total',
        'tid',
        'mid',
        'agent_name',
        'stan',
        'status'
    ];

    protected $table = 'transaction_bjb';

}
