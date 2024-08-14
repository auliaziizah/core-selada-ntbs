<?php

namespace App\Presenters;

use App\Transformers\GroupSchemaShareholderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GroupSchemaShareholderPresenter.
 *
 * @package namespace App\Presenters;
 */
class GroupSchemaShareholderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GroupSchemaShareholderTransformer();
    }
}
