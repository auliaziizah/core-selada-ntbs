<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class Schema.
 *
 * @package namespace App\Entities;
 */
class Schema extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $presenter = SchemaPresenter::class;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'name'
    ];

    protected $table = 'schemas';

}
