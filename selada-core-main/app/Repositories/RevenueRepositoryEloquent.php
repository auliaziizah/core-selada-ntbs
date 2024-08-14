<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RevenueRepository;
use App\Entities\Revenue;
use App\Validators\RevenueValidator;

/**
 * Class RevenueRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RevenueRepositoryEloquent extends BaseRepository implements RevenueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Revenue::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RevenueValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
