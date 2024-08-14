<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class RolePrivilege.
 *
 * @package namespace App\Entities;
 */
class RolePrivilege extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'role_id',
        'privilege_id',
    ];

    protected $table = 'role_privileges';

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function privilege()
    {
        return $this->belongsTo(Privilege::class,'privilege_id','id');
    }

}
