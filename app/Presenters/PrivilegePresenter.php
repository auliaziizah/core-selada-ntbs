<?php

namespace App\Presenters;

use App\Transformers\PrivilegeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PrivilegePresenter.
 *
 * @package namespace App\Presenters;
 */
class PrivilegePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PrivilegeTransformer();
    }
}
