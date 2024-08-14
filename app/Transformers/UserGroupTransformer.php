<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UserGroup;

/**
 * Class UserGroupTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserGroupTransformer extends TransformerAbstract
{
    /**
     * Transform the UserGroup entity.
     *
     * @param \App\Entities\UserGroup $model
     *
     * @return array
     */
    public function transform(UserGroup $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
