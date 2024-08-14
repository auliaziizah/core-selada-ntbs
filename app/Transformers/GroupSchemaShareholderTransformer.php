<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\GroupSchemaShareholder;

/**
 * Class GroupSchemaShareholderTransformer.
 *
 * @package namespace App\Transformers;
 */
class GroupSchemaShareholderTransformer extends TransformerAbstract
{
    /**
     * Transform the GroupSchemaShareholder entity.
     *
     * @param \App\Entities\GroupSchemaShareholder $model
     *
     * @return array
     */
    public function transform(GroupSchemaShareholder $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
