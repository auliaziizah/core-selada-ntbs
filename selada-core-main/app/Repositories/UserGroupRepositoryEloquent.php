<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserGroupRepository;
use App\Entities\UserGroup;
use App\Validators\UserGroupValidator;

/**
 * Class UserGroupRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserGroupRepositoryEloquent extends BaseRepository implements UserGroupRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserGroup::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserGroupValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
