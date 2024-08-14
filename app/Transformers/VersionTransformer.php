<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Version;

/**
 * Class VersionTransformer.
 *
 * @package namespace App\Transformers;
 */
class VersionTransformer extends TransformerAbstract
{
    /**
     * Transform the Version entity.
     *
     * @param \App\Entities\Version $model
     *
     * @return array
     */
    public function transform(Version $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
