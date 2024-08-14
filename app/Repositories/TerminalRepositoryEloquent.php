<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TerminalRepository;
use App\Entities\Terminal;
use App\Validators\TerminalValidator;

/**
 * Class TerminalRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TerminalRepositoryEloquent extends BaseRepository implements TerminalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Terminal::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TerminalValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
