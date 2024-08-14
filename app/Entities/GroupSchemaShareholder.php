<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

/**
 * Class GroupSchemaShareholder.
 *
 * @package namespace App\Entities;
 */
class GroupSchemaShareholder extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $presenter = GroupSchemaShareholderPresenter::class;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'group_schema_id',
        'shareholder_id',
        'share'
    ];

    protected $table = 'group_schema_shareholders';

    public function shareholder()
    {
        return $this->belongsTo(Shareholder::class,'shareholder_id','id');
    }

}
