<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Topup.
 *
 * @package namespace App\Entities;
 */
class Topup extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'merchant_id',
        'bank_id',
        'amount',
        'amount_unique',
        'date',
        'note',
        'status'
    ];

    protected $table = 'topups';

}
