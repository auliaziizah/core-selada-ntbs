<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\GroupSchema;

/**
 * Class GroupSchemaTransformer.
 *
 * @package namespace App\Transformers;
 */
class GroupSchemaTransformer extends TransformerAbstract
{
    /**
     * Transform the GroupSchema entity.
     *
     * @param \App\Entities\GroupSchema $model
     *
     * @return array
     */
    public function transform(GroupSchema $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
