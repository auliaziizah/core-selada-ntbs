<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TransactionBJBRepository;
use App\Entities\TransactionBJB;
use App\Validators\TransactionBJBValidator;

/**
 * Class TransactionBJBRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TransactionBJBRepositoryEloquent extends BaseRepository implements TransactionBJBRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TransactionBJB::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TransactionBJBValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
