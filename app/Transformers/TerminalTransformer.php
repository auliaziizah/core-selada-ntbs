<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Terminal;

/**
 * Class TerminalTransformer.
 *
 * @package namespace App\Transformers;
 */
class TerminalTransformer extends TransformerAbstract
{
    /**
     * Transform the Terminal entity.
     *
     * @param \App\Entities\Terminal $model
     *
     * @return array
     */
    public function transform(Terminal $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
