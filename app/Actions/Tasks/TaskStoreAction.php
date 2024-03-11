<?php

namespace App\Actions\Tasks;

use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Models\Task;

class TaskStoreAction
{
    public function execute(TaskStoreRequest $request)
    {
        $validated = $request->validated();
        $task = Task::create($validated);

        return $task;
    }
}
