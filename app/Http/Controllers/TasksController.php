<?php

namespace App\Http\Controllers;

use App\Models\Task as ModelsTask;
use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
      public function index()
    {
        $tasks = ModelsTask::all();
        $users = User::all();
        return view('tasks', compact('tasks', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|string',
            'description' => 'required|string',
            'deadline' => [
                'required',
                'date',
        
            ], 
            'priority' => 'required',
            'assigned_person' => 'required',
        ]);
        $task = new ModelsTask();
        $task->u_id = auth()->user()->id; 
        $task->task_name = $validatedData['task'];
        $task->task_description = $validatedData['description'];
        $task->deadline = $validatedData['deadline'];
        $task->priority = $validatedData['priority'];
        $task->person_assigned = $validatedData['assigned_person']; // Assuming default status is 'pending'
        $task->save();
        

        return redirect()->route('tasks')->with('success', 'Task created successfully');
    }
}