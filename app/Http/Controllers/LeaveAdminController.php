<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave; 
use App\Models\User;

class LeaveAdminController extends Controller
{
    public function index(){
        $leaveRequests = Leave::all(); // Fetch all leave requests
        return view('leave-admin')->with('leaveRequests', $leaveRequests);
    }
    
    public function approve($id){ // Accept the $id parameter here
        $leaveRequest = Leave::findOrFail($id);
        
        $leaveRequest->status = 'Approved';
        
        $leaveRequest->save();

        return redirect()->route('about')->with('success', 'Leave request approved successfully.');
    }
    
    public function reject($id){ // Accept the $id parameter here
        $leaveRequest = Leave::findOrFail($id);
        
        $leaveRequest->status = 'Rejected';
        
        $leaveRequest->save();
        
        return redirect()->route('about')->with('success', 'Leave request rejected successfully.');
    }
}