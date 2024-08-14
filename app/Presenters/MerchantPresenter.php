<?php

namespace App\Presenters;

use App\Transformers\MerchantTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MerchantPresenter.
 *
 * @package namespace App\Presenters;
 */
class MerchantPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MerchantTransformer();
    }
}
