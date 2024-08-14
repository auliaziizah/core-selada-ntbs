<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Provider;

/**
 * Class ProviderTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProviderTransformer extends TransformerAbstract
{
    /**
     * Transform the Provider entity.
     *
     * @param \App\Entities\Provider $model
     *
     * @return array
     */
    public function transform(Provider $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
