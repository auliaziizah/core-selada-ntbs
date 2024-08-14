<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RolePrivilegeRepository;
use App\Entities\RolePrivilege;
use App\Validators\RolePrivilegeValidator;

/**
 * Class RolePrivilegeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RolePrivilegeRepositoryEloquent extends BaseRepository implements RolePrivilegeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RolePrivilege::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RolePrivilegeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
