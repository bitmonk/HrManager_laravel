<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\PunchIn;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index(){
    $users = User::all();
    $leaveRequests = Leave::all();
    $punchIns = PunchIn::all();
    $uniqueUsernames = $punchIns->unique('user_id')->pluck('user.name');

    return view('admin.index', compact('users', 'leaveRequests', 'punchIns', 'uniqueUsernames'));
}
}
