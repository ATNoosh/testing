<?php

namespace App\Actions\Tasks;

use App\Events\TaskStatusChangedEvent;
use App\Http\Requests\Tasks\TaskUpdateRequest;

class TaskUpdateAction
{
    public function execute(TaskUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $task = request()->user()->tasks->where('id', $id)->first();
        $task->fill($validated);

        TaskStatusChangedEvent::dispatchIf($task->isDirty('status'), $task);

        $task->save();

        return $task;
    }
}
