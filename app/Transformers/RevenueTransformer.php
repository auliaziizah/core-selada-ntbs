<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Revenue;

/**
 * Class RevenueTransformer.
 *
 * @package namespace App\Transformers;
 */
class RevenueTransformer extends TransformerAbstract
{
    /**
     * Transform the Revenue entity.
     *
     * @param \App\Entities\Revenue $model
     *
     * @return array
     */
    public function transform(Revenue $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
