<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;

/**
 * Class TopupCounter.
 *
 * @package namespace App\Entities;
 */
class TopupCounter extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'date',
        'counter'
    ];

    protected $table = 'topup_counters';

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->date  = Carbon::today();
        });
    }

}
