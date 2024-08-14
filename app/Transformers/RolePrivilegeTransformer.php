<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RolePrivilege;

/**
 * Class RolePrivilegeTransformer.
 *
 * @package namespace App\Transformers;
 */
class RolePrivilegeTransformer extends TransformerAbstract
{
    /**
     * Transform the RolePrivilege entity.
     *
     * @param \App\Entities\RolePrivilege $model
     *
     * @return array
     */
    public function transform(RolePrivilege $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
