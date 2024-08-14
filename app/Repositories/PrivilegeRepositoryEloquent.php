<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PrivilegeRepository;
use App\Entities\Privilege;
use App\Validators\PrivilegeValidator;

/**
 * Class PrivilegeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PrivilegeRepositoryEloquent extends BaseRepository implements PrivilegeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Privilege::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PrivilegeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
