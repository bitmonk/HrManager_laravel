<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\PunchIn;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $leaveRequests = Leave::all();
        $punchIns = PunchIn::all();
        $uniqueUsernames = $punchIns->unique('user_id')->pluck('user.name');
        $tasks = Task::all();
        $error = "task not found!";

        // Initialize empty arrays to store position information
        $positions = [];
        $positionIds = [];

        // Iterate over each user to get position information
        foreach ($users as $user) {
            // Check if the user has a position relationship
            if ($user->position) {
                $positions[] = $user->position->position;
                $positionIds[] = $user->position->id;
            } else {
                // If no position is found, you can set default values or leave them empty
                $positions[] = 'Unassigned';
                $positionIds[] = null;
            }
        }

        return view('admin.index', compact('users', 'leaveRequests', 'punchIns', 'uniqueUsernames', 'tasks', 'positions', 'positionIds'));
    }
}

