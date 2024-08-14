<?php

namespace App\Presenters;

use App\Transformers\GroupSchemaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GroupSchemaPresenter.
 *
 * @package namespace App\Presenters;
 */
class GroupSchemaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GroupSchemaTransformer();
    }
}
