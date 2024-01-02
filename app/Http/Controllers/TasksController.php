<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('completed_at')
            ->orderBy('id', 'DESC')
            ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|string|max:255',
        ]);

        Task::create([
            'description' => $request->input('description'),
        ]);

        return redirect('/');
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);

        $task->completed_at = now();
        $task->save();

        $completedTasks = session('completed_tasks', []);
        $completedTasks[] = $task->id;

        session(['completed_tasks' => $completedTasks]);

        return redirect('/')->with('status', 'Task completed successfully!');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->back()->with('message', 'Task deleted successfully.');
    }
}
