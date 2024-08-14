<?php

namespace App\Presenters;

use App\Transformers\UserGroupTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserGroupPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserGroupPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserGroupTransformer();
    }
}
