<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Shareholder;

/**
 * Class ShareholderTransformer.
 *
 * @package namespace App\Transformers;
 */
class ShareholderTransformer extends TransformerAbstract
{
    /**
     * Transform the Shareholder entity.
     *
     * @param \App\Entities\Shareholder $model
     *
     * @return array
     */
    public function transform(Shareholder $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
