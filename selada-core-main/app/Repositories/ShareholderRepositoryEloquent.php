<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ShareholderRepository;
use App\Entities\Shareholder;
use App\Validators\ShareholderValidator;

/**
 * Class ShareholderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ShareholderRepositoryEloquent extends BaseRepository implements ShareholderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Shareholder::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ShareholderValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
