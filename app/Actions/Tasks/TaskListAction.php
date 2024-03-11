<?php

namespace App\Actions\Tasks;

use App\Constants\GeneralConstants;
use App\Constants\TaskStatuses;
use App\Http\Requests\Tasks\TaskListRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class TaskListAction
{
    public function execute(TaskListRequest $request)
    {
        $validated = $request->validated();
        $tasks = $request->user()->tasks()
            ->when($validated['status'] !== TaskStatuses::ALL, function (Builder $query) use ($validated) {
                $query->where('status', $validated['status']);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(min($request['page_size'] ?? GeneralConstants::PAGE_SIZE, GeneralConstants::PAGE_SIZE));

        return $tasks;
    }
}
