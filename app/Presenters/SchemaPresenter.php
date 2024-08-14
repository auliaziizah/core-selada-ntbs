<?php

namespace App\Presenters;

use App\Transformers\SchemaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SchemaPresenter.
 *
 * @package namespace App\Presenters;
 */
class SchemaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SchemaTransformer();
    }
}
