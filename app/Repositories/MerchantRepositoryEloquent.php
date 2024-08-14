<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MerchantRepository;
use App\Entities\Merchant;
use App\Validators\MerchantValidator;

/**
 * Class MerchantRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MerchantRepositoryEloquent extends BaseRepository implements MerchantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Merchant::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MerchantValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
