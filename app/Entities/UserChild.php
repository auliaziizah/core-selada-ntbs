<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Auth;

/**
 * Class UserChild.
 *
 * @package namespace App\Entities;
 */
class UserChild extends Model implements Transformable
{
    use TransformableTrait;

    protected $presenter = UserChildPresenter::class;
    public $incrementing = true;

    protected $fillable = [
        'id',
        'user_id',
        'child_id',
    ];

    protected $table = 'user_childs';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function child()
    {
        return $this->belongsTo(User::class,'child_id','id');
    }

}
