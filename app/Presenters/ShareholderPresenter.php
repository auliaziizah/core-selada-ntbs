<?php

namespace App\Presenters;

use App\Transformers\ShareholderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ShareholderPresenter.
 *
 * @package namespace App\Presenters;
 */
class ShareholderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ShareholderTransformer();
    }
}
