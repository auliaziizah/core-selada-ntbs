<?php

namespace App\Presenters;

use App\Transformers\TransactionPaymentStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TransactionPaymentStatusPresenter.
 *
 * @package namespace App\Presenters;
 */
class TransactionPaymentStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TransactionPaymentStatusTransformer();
    }
}
