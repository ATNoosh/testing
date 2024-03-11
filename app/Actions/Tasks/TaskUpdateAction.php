<?php

namespace App\Actions\Tasks;

use App\Http\Requests\Tasks\TaskUpdateRequest;

class TaskUpdateAction
{
    public function execute(TaskUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $task = request()->user()->tasks->where('id', $id)->first();
        $task->update($validated);

        return $task;
    }
}
