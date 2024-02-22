<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PunchIn;
use Illuminate\Support\Facades\Session;


class PunchInController extends Controller
{

    public function index()
    {
        
        if (Auth::check()) {
            $user = Auth::user();

        $latestPunchIn = $user->punchIns()->latest()->first();
        return view('punchin')->with('punchInTime', $latestPunchIn);
        }
    }

    public function punchIn(Request $request){

        // Validate the request
        $request->validate([
            'to_do' => 'required|string',
    ]);
    
         // Check if the user is authenticated
         if (Auth::check()) {
            // Create a new punch-in record for the authenticated user
            $user = Auth::user();
            $punchIn = new PunchIn();
            $punchIn->user_id = $user->id;
            $punchIn->punch_in_time = now();
            $punchIn->to_do = $request->input('to_do');
            $punchIn->save();

            return redirect()->route('home')->with('success', 'Punched in successfully!');
            
        }

        return redirect()->back()->with('error', 'Unauthorized');
    }


    public function punchOut(Request $request)
{
    // Validate the request
    $request->validate([
        'task_completed' => 'required|string',
    ]);
    
    if (Auth::check()) {
        
        $user = Auth::user();
        $latestPunchIn = $user->punchIns()->latest()->first();

        // Update the punch-out time and task completed for the latest punch-in record
        $latestPunchIn->update([
            'punch_out_time' => now(),
            'task_completed' => $request->input('task_completed')
        ]);

        return redirect()->route('home')->with('success', 'Punched out successfully!');

    }

    return redirect()->back()->with('error', 'Unauthorized');
}

}
