<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Webpatser\Uuid\Uuid;
use DateTimeZone;
use DateTime;

use Auth;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'role_id', 'username', 'email', 'fullname', 'password', 'status', 'is_user_mireta'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function user_group()
    {
        return $this->hasMany(UserGroup::class,'user_id','id');
    }

    public function merchant()
    {
        return $this->hasOne(Merchant::class,'user_id','id');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id          = (string) Uuid::generate(4);
        });
    }

    public function can_access($menu)
    {
        $role_id = Auth::user()->role_id;
        $role_privilege = RolePrivilege::where('role_id',$role_id)
                                        ->with('privilege')
                                        ->get();

        $arrPrivilege = array();
        foreach ($role_privilege as $key => $value) {
            array_push($arrPrivilege, $value->privilege->name);
        }
        
        if (in_array($menu, $arrPrivilege)) {
            return true;
        } else {
            return false;
        }
    }

    public function has_action($menu, $action)
    {
        $role_id = Auth::user()->role_id;
        $role_privilege = Privilege::where('role_id',$role_id)
                                    ->where('name', '=', $menu)
                                    ->where('key', '=', $action)
                                    ->select('key', 'value')
                                    ->first();
        return $role_privilege->value;
    }

    public function getRole()
    {
        $role_id = Auth::user()->role_id;
        $role = Role::where('id',$role_id)
            ->first();

        if ($role) {
            $result = $role->name;
        }else{
            $result = 'no role';
        }

        return $result;
    }
}
