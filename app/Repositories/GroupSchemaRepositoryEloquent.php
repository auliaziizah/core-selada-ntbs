<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GroupSchemaRepository;
use App\Entities\GroupSchema;
use App\Validators\GroupSchemaValidator;

/**
 * Class GroupSchemaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GroupSchemaRepositoryEloquent extends BaseRepository implements GroupSchemaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GroupSchema::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GroupSchemaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
