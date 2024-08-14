<?php

namespace App\Presenters;

use App\Transformers\BillerDetailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BillerDetailPresenter.
 *
 * @package namespace App\Presenters;
 */
class BillerDetailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillerDetailTransformer();
    }
}
