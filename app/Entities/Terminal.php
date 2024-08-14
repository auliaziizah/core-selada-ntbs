<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Terminals.
 *
 * @package namespace App\Entities;
 */
class Terminal extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'merchant_id',
        'merchant_name',
        'merchant_address',
        'merchant_account_number',
        'serial_number',
        'sid',
        'iccid',
        'imei',
        'tid'
    ];

    protected $table = 'terminals';
}
