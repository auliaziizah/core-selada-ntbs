<?php

namespace App\Presenters;

use App\Transformers\BillerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BillerPresenter.
 *
 * @package namespace App\Presenters;
 */
class BillerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillerTransformer();
    }
}
