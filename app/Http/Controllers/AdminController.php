<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index(){
    $users = User::all();

    // $address = Address::where('u_id', $user->id)->first();
    // $emergency_contact = emergency_contact::where('u_id', $user->id)->first();

    // return view('admin.index', compact('users','address','emergency_contact'));


//     return view('admin.index', compact('users'));
// }
    $leaveRequests = Leave::all();

    return view('admin.index', compact('users', 'leaveRequests'));
}
}
