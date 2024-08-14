<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\TransactionPaymentStatus;

/**
 * Class TransactionPaymentStatusTransformer.
 *
 * @package namespace App\Transformers;
 */
class TransactionPaymentStatusTransformer extends TransformerAbstract
{
    /**
     * Transform the TransactionPaymentStatus entity.
     *
     * @param \App\Entities\TransactionPaymentStatus $model
     *
     * @return array
     */
    public function transform(TransactionPaymentStatus $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
