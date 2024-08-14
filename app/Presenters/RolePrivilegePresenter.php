<?php

namespace App\Presenters;

use App\Transformers\RolePrivilegeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RolePrivilegePresenter.
 *
 * @package namespace App\Presenters;
 */
class RolePrivilegePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RolePrivilegeTransformer();
    }
}
