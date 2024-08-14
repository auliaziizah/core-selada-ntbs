<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Transaction;

/**
 * Class TransactionTransformer.
 *
 * @package namespace App\Transformers;
 */
class TransactionTransformer extends TransformerAbstract
{
    /**
     * Transform the Transaction entity.
     *
     * @param \App\Entities\Transaction $model
     *
     * @return array
     */
    public function transform(Transaction $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
