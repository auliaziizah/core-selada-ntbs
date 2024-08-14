<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Biller;

/**
 * Class BillerTransformer.
 *
 * @package namespace App\Transformers;
 */
class BillerTransformer extends TransformerAbstract
{
    /**
     * Transform the Biller entity.
     *
     * @param \App\Entities\Biller $model
     *
     * @return array
     */
    public function transform(Biller $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
