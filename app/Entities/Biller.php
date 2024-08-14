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
class Biller extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'name',
        'code',
        'address',
        'phone',
        'email',
        'balance',
        'avatar',
        'user_id',
        'pin',
        'username',
        'password',
        'status'
    ];

    protected $table = 'billers';
}
