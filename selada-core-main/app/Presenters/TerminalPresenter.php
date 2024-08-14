<?php

namespace App\Presenters;

use App\Transformers\TerminalTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TerminalPresenter.
 *
 * @package namespace App\Presenters;
 */
class TerminalPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TerminalTransformer();
    }
}
