<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GroupSchemaShareholderRepository;
use App\Entities\GroupSchemaShareholder;
use App\Validators\GroupSchemaShareholderValidator;

/**
 * Class GroupSchemaShareholderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GroupSchemaShareholderRepositoryEloquent extends BaseRepository implements GroupSchemaShareholderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GroupSchemaShareholder::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GroupSchemaShareholderValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
