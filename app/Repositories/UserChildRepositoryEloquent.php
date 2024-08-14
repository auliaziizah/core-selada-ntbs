<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserChildRepository;
use App\Entities\UserChild;
use App\Validators\UserChildValidator;

/**
 * Class UserChildRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserChildRepositoryEloquent extends BaseRepository implements UserChildRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserChild::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserChildValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
