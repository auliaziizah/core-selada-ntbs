<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SchemaRepository;
use App\Entities\Schema;
use App\Validators\SchemaValidator;

/**
 * Class SchemaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SchemaRepositoryEloquent extends BaseRepository implements SchemaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Schema::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SchemaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
