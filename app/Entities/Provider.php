<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Providers.
 *
 * @package namespace App\Entities;
 */
class Provider extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'code',
        'description',
        'avatar',
        'status'
    ];

    protected $table = 'providers';

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
