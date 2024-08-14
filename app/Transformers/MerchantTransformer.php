<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Merchant;

/**
 * Class MerchantTransformer.
 *
 * @package namespace App\Transformers;
 */
class MerchantTransformer extends TransformerAbstract
{
    /**
     * Transform the Merchant entity.
     *
     * @param \App\Entities\Merchant $model
     *
     * @return array
     */
    public function transform(Merchant $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
