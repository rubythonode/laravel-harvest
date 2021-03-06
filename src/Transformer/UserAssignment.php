<?php

namespace Byte5\LaravelHarvest\Transformer;

use Byte5\LaravelHarvest\Contracts\Transformer;
use \Byte5\LaravelHarvest\Models\UserAssignment as UserAssignmentModel;

class UserAssignment implements Transformer
{
    /**
     * @param $data
     * @return mixed
     */
    public function transformModelAttributes($data)
    {
        $userAssignment = (new UserAssignmentModel())->firstOrNew(['external_id' => $data['id']]);

        $userAssignment->external_id = $data['id'];
        $userAssignment->user = $data['user'];
        $userAssignment->is_active = $data['is_active'];
        $userAssignment->is_project_manager = $data['is_project_manager'];
        $userAssignment->hourly_rate = $data['hourly_rate'];
        $userAssignment->budget = $data['budget'];

        return $userAssignment;
    }
}