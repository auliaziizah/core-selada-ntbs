<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class Revenue.
 *
 * @package namespace App\Entities;
 */
class Revenue extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $presenter = RevenuePresenter::class;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'type', // 1 temp bisa di update, 2 permanent
        'merchant_id',
        'amount',
        'date'
    ];

    protected $table = 'revenues';
}
