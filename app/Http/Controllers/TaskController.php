<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Feedback;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function showFeedbackForm(Task $task)
    {
        return view('tasks.feedback', compact('task'));
    }

    public function giveFeedback(Request $request, Task $task)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $feedback = Feedback::create([
            'task_id' => $task->id,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Feedback submitted successfully.');
    }

    public function showFeedbacks($taskId)
{
    $task = Task::findOrFail($taskId);

    $feedbacks = Feedback::where('task_id', $taskId)->get();

    return view('tasks.show-feedbacks', compact('task', 'feedbacks'));
}
}
