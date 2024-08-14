<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Billers.
 *
 * @package namespace App\Entities;
 */
class BillerDetail extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'biller_id',
        'code',
        'description',
        'url',
        'request_type'
    ];

    protected $table = 'biller_details';
}
