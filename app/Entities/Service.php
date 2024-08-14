<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Services.
 *
 * @package namespace App\Entities;
 */
class Service extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'category_id',
        'provider_id',
        'product_id',
        'type',
        'code',
        'markup',
        'biller_id',
        'biller_code',
        'biller_price',
        'status',
        'system_markup'
    ];

    protected $table = 'services';

    public function biller()
    {
        return $this->belongsTo(Biller::class,'biller_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
