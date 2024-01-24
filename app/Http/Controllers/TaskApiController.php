<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TaskApiController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());

        return Response::json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return Response::json($task, 200);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return Response::json(null, 204);
    }
}
