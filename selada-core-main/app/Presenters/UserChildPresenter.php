<?php

namespace App\Presenters;

use App\Transformers\UserChildTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserChildPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserChildPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserChildTransformer();
    }
}
