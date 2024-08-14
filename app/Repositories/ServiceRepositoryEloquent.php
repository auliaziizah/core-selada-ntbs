<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ServiceRepository;
use App\Entities\Service;
use App\Validators\ServiceValidator;

/**
 * Class ServiceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ServiceRepositoryEloquent extends BaseRepository implements ServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Service::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
