<?php

namespace App\Http\Controllers\API;

use App\Actions\Tasks\TaskDeleteAction;
use App\Actions\Tasks\TaskListAction;
use App\Actions\Tasks\TaskStoreAction;
use App\Actions\Tasks\TaskUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\TaskDeleteRequest;
use App\Http\Requests\Tasks\TaskListRequest;
use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Http\Requests\Tasks\TaskUpdateRequest;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TaskListRequest $request)
    {
        $tasks = app(TaskListAction::class)->execute($request);

        return response()->json($tasks, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $task = app(TaskStoreAction::class)->execute($request);

        return response()->json($task, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = request()->user()->tasks->where('id', $id)->first();

        return response()->json($task, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, string $id)
    {
        $task = app(TaskUpdateAction::class)->execute($request, $id);

        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskDeleteRequest $request,  string $id)
    {
        app(TaskDeleteAction::class)->execute($request, $id);

        return response()->json('Task deleted successfully!', 200);
    }
}
