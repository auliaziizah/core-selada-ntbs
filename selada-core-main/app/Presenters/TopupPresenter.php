<?php

namespace App\Presenters;

use App\Transformers\TopupTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TopupPresenter.
 *
 * @package namespace App\Presenters;
 */
class TopupPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TopupTransformer();
    }
}
