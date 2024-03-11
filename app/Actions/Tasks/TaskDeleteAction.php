<?php

namespace App\Actions\Tasks;

use App\Http\Requests\Tasks\TaskDeleteRequest;
use App\Models\Task;

class TaskDeleteAction
{
    public function execute(TaskDeleteRequest $request, $id)
    {
        $validated = $request->validated();
        $task = request()->user()->tasks->where('id', $id)->first();
        $task->delete();

        return true;
    }
}
