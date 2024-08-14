<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\TransactionBJB;

/**
 * Class TransactionBJBTransformer.
 *
 * @package namespace App\Transformers;
 */
class TransactionBJBTransformer extends TransformerAbstract
{
    /**
     * Transform the TransactionBJB entity.
     *
     * @param \App\Entities\TransactionBJB $model
     *
     * @return array
     */
    public function transform(TransactionBJB $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
