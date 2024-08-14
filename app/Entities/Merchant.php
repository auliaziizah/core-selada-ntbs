<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Merchants.
 *
 * @package namespace App\Entities;
 */
class Merchant extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $incrementing = true;

    protected $fillable = [
        'id',
        'merchant_id',
        'type',
        'name',
        'no',
        'code',
        'address',
        'city',
        'phone',
        'email',
        'balance',
        'avatar',
        'status',
        'user_id',
        'terminal_id',
        'screen_id',
        'mid'
    ];

    protected $table = 'merchants';

    public function terminal()
    {
        return $this->hasOne(Terminal::class,'merchant_id','mid');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
