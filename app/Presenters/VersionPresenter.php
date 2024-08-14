<?php

namespace App\Presenters;

use App\Transformers\VersionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VersionPresenter.
 *
 * @package namespace App\Presenters;
 */
class VersionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VersionTransformer();
    }
}
