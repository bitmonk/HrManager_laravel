<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PunchIn;

class ActivityAdminController extends Controller
{
    
    public function index(){

        // $user = Auth::user();

        $punchIns = PunchIn::all(); // Fetch all punch-in records, adjust this according to your needs

        return view('activity-log-admin')->with('punchIns', $punchIns);
    }
    public function show(Request $request)
    {   

    }
}
