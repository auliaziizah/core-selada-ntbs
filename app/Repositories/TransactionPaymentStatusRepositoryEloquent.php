<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TransactionPaymentStatusRepository;
use App\Entities\TransactionPaymentStatus;
use App\Validators\TransactionPaymentStatusValidator;

/**
 * Class TransactionPaymentStatusRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TransactionPaymentStatusRepositoryEloquent extends BaseRepository implements TransactionPaymentStatusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TransactionPaymentStatus::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TransactionPaymentStatusValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
