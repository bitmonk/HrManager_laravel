<?php

namespace App\Http\Controllers;

use App\Models\Task as ModelsTask;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
      public function index()
    {
        $tasks = ModelsTask::all();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        // Handle task creation logic, including file upload if needed
        // ...

        return redirect()->route('tasks')->with('success', 'Task created successfully');
    }
}