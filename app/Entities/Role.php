<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Role.
 *
 * @package namespace App\Entities;
 */
class Role extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'name'
    ];

    protected $table = 'roles';

}
