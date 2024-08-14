<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UserChild;

/**
 * Class UserChildTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserChildTransformer extends TransformerAbstract
{
    /**
     * Transform the UserChild entity.
     *
     * @param \App\Entities\UserChild $model
     *
     * @return array
     */
    public function transform(UserChild $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
