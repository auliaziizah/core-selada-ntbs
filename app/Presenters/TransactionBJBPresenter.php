<?php

namespace App\Presenters;

use App\Transformers\TransactionBJBTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TransactionBJBPresenter.
 *
 * @package namespace App\Presenters;
 */
class TransactionBJBPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TransactionBJBTransformer();
    }
}
