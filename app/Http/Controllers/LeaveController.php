<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave; 
use App\Models\User;



class LeaveController extends Controller
{
    public function index(){
        $leaveRequests = Leave::all(); // Fetch all leave requests, adjust this according to your needs
        return view('leave')->with('leaveRequests', $leaveRequests);
        
    }
    public function apply(Request $request)
    {
        // Validate the incoming form data
        $validatedData = $request->validate([
            'reason' => 'required|string',
            'from' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {     //validation so that the till date cant be before from date
                    $till = $request->input('till');
                    if ($till && strtotime($value) >= strtotime($till)) {
                        $fail('The from date must be before the Till date. Enter valid date.');
                    }
                },
            ], 
            'till' => 'required|date',
        ]);

        // Create a new leave request record in the database
        $leave = new Leave();
        $leave->user_id = auth()->user()->id; 
        $leave->reason = $validatedData['reason'];
        $leave->from = $validatedData['from'];
        $leave->till = $validatedData['till'];
        $leave->status = 'pending'; // Assuming default status is 'pending'
        $leave->save();

        // Redirect the user to an appropriate page
        return redirect()->route('leave')->with('success', 'Leave application submitted successfully.');
    }

}
