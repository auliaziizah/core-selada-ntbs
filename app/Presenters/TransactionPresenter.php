<?php

namespace App\Presenters;

use App\Transformers\TransactionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TransactionPresenter.
 *
 * @package namespace App\Presenters;
 */
class TransactionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TransactionTransformer();
    }
}
