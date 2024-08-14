<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\BillerDetail;

/**
 * Class BillerDetailTransformer.
 *
 * @package namespace App\Transformers;
 */
class BillerDetailTransformer extends TransformerAbstract
{
    /**
     * Transform the BillerDetail entity.
     *
     * @param \App\Entities\BillerDetail $model
     *
     * @return array
     */
    public function transform(BillerDetail $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
