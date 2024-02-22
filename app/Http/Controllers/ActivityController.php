<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PunchIn;



class ActivityController extends Controller
{
    public function index(){

        // $user = Auth::user();

        $punchIns = PunchIn::all(); // Fetch all punch-in records, adjust this according to your needs
        // $punchIns = PunchIn::where('user_id', auth()->id())->paginate(5);

        return view('activity-log')->with('punchIns', $punchIns);
    }
    public function show(Request $request)
    {   

    }
}