<?php
namespace Kumuwai\Playground\Modules\Project003;

use League\Fractal;

class TaskTransformer extends Fractal\TransformerAbstract
{
    public function transform(Task $task)
    {
        return [
            'id' => (int) $task['id'],
            'name' => $task['name'],
            'done' => (bool) $task['done'],
            'links'   => [
                'self' => [
                    'rel' => 'self',
                    'uri' => 'api/tasks/'.$task->id,
                ]
            ],
        ];
    }
}
