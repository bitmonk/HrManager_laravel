<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $user = Auth::user();

        $totalTasks = Task::count();

        $leaveRequests = Leave::where('status', 'pending')->count();
        $widget = [
            'users' => $users,
            //...
        ];



        return view('home', compact('widget','users', 'totalTasks', 'leaveRequests'));
    }
}
