<?php

namespace App\Presenters;

use App\Transformers\TransactionStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TransactionStatusPresenter.
 *
 * @package namespace App\Presenters;
 */
class TransactionStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TransactionStatusTransformer();
    }
}
