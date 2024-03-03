<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\PunchIn;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
public function index(){
    $users = User::all();

    if (Auth::check()) {
        $user = Auth::user();
    
    $latestPunchIn = $user->punchIns()->latest()->first();
    }
    // $address = Address::where('u_id', $user->id)->first();
    // $emergency_contact = emergency_contact::where('u_id', $user->id)->first();

    // return view('admin.index', compact('users','address','emergency_contact'));


//     return view('admin.index', compact('users'));
// }
    $leaveRequests = Leave::all();

    return view('admin.index', compact('users', 'leaveRequests','latestPunchIn'));
}
}
