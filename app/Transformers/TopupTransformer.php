<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Topup;

/**
 * Class TopupTransformer.
 *
 * @package namespace App\Transformers;
 */
class TopupTransformer extends TransformerAbstract
{
    /**
     * Transform the Topup entity.
     *
     * @param \App\Entities\Topup $model
     *
     * @return array
     */
    public function transform(Topup $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
