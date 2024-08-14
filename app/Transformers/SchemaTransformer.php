<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Schema;

/**
 * Class SchemaTransformer.
 *
 * @package namespace App\Transformers;
 */
class SchemaTransformer extends TransformerAbstract
{
    /**
     * Transform the Schema entity.
     *
     * @param \App\Entities\Schema $model
     *
     * @return array
     */
    public function transform(Schema $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
