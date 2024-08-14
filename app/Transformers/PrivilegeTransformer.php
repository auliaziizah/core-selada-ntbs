<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Privilege;

/**
 * Class PrivilegeTransformer.
 *
 * @package namespace App\Transformers;
 */
class PrivilegeTransformer extends TransformerAbstract
{
    /**
     * Transform the Privilege entity.
     *
     * @param \App\Entities\Privilege $model
     *
     * @return array
     */
    public function transform(Privilege $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
