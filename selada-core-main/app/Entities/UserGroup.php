<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Auth;

/**
 * Class UserGroup.
 *
 * @package namespace App\Entities;
 */
class UserGroup extends Model implements Transformable
{
    use TransformableTrait;

    protected $presenter = UserGroupPresenter::class;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'user_id',
        'group_id',
    ];

    protected $table = 'user_groups';

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

}
