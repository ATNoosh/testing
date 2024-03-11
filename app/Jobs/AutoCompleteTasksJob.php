<?php

namespace App\Jobs;

use App\Constants\TaskStatuses;
use App\Events\TaskStatusChangedEvent;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AutoCompleteTasksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if(env('TASKS_AUTO_COMPLETE_BROADCAST'))
            Task::uncompleted()
                ->createdDaysBefore(2)
                ->chunk(env('TASK_CHUNK_SIZE'), function (Collection $tasks) {
                    foreach ($tasks as $task) {
                        $task->status = TaskStatuses::COMPLETED;
                        TaskStatusChangedEvent::dispatchIf($task->isDirty('status'), $task);
                        $task->save();
                    }
                });
        else
            Task::uncompleted()
                ->createdDaysBefore(2)
                ->update(['status' => TaskStatuses::COMPLETED]);
    }
}
