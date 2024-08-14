<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class GroupSchema.
 *
 * @package namespace App\Entities;
 */
class GroupSchema extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $presenter = GroupSchemaPresenter::class;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'group_id',
        'schema_id',
        'share',
        'is_shareable'
    ];

    protected $table = 'group_schemas';

}
