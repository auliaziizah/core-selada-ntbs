<?php

namespace App\Presenters;

use App\Transformers\RevenueTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RevenuePresenter.
 *
 * @package namespace App\Presenters;
 */
class RevenuePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RevenueTransformer();
    }
}
