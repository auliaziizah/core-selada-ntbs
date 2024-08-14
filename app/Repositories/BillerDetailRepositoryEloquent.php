<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BillerDetailRepository;
use App\Entities\BillerDetail;
use App\Validators\BillerDetailValidator;

/**
 * Class BillerDetailRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BillerDetailRepositoryEloquent extends BaseRepository implements BillerDetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BillerDetail::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BillerDetailValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
