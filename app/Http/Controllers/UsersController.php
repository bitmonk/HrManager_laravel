<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\position;
use App\Models\salary;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('users', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $temporaryAddresses = $user->address()->where('type', 'temporary')->get();

        $city = $district = $street = $zipcode = 'Empty';
        foreach ($temporaryAddresses as $temporaryAddress) {
            $city = optional($temporaryAddress->city)->name ?? 'Empty';
            $district = optional($temporaryAddress->district)->name ?? 'Empty';
            $street = optional($temporaryAddress->tole)->name ?? 'Empty';
            $zipcode = optional($temporaryAddress->zipcode)->code ?? 'Empty';
        }
        
        $emergencyContact = $user->emergencyContact()->first(); // Use first() instead of get()

        $emergencyContactName = $emergencyContact ? $emergencyContact->name : null;
        $emergencyContactPhone = $emergencyContact ? $emergencyContact->phone : null;
        $emergencyContactRelation = $emergencyContact ? $emergencyContact->relation : null;

        
        if ($user->level) {
            $levelName = $user->level->level; // Replace 'name' with the actual column name in the levels table
            // Access other properties as needed
        } else {
            $levelName = 'Unassigned';
        }
        $amount = $salaryType = 'Unassigned';
        if ($user) {
            // Access salary information
            $salaries = $user->salary;
            // dd($salaries);
        
            if (optional($salaries)->count() > 0) {
                foreach ($salaries as $sal) {
                    // Access salary details
                    $amount = optional($sal)->salary;
                    $salaryType = optional($sal)->salary_type;
                }
            } else {
                // Handle the null or empty condition
                $amount = 'Unassigned';
                $salaryType = 'Unassigned';
            }
            
        } else {
            $amount = 'User not found';
            $salaryType = 'User not found';
        }
        

        $bankDetails = $user->bankDetails;
        $bankName = $bankDetails ? $bankDetails->bank_name : null;
        $accountName = $bankDetails ? $bankDetails->account_name : null;
        $accountNumber = $bankDetails ? $bankDetails->account_number : null;
        
        

    return view('admin.view', compact(
        'user',
        'city',
        'district',
        'street',
        'zipcode',
        'emergencyContactName',
        'emergencyContactRelation',
        'emergencyContactPhone',
        'levelName',
        'amount',
        'salaryType',
        'bankName',
        'accountName',
        'accountNumber'

    ));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
    

        $position = $user->position ? $user->position->position : null;

        $positionId = $user->position ? $user->position->id : null;
        

        $levelId = $user->level ? $user->level->id : null;
        
        

        $tasks = Task::all();
        $error = "task not found!";
        if ($tasks) {
        } else {
            $tasks = "Unassigned";
        }

        $salary = $user->salary ? $user->salary :null;
        $salaryTypes = User::distinct()->pluck('salary_type')->toArray();
        // dd($salaryTypes);

        $start_time = $user->start_time ? $user->start_time : null;
        $end_time = $user->end_time ? $user->end_time : null;

        return view('admin.edit', compact('user', 'position', 'positionId', 'levelId', 'salary', 'tasks', 'salaryTypes', 'start_time', 'end_time','error'));
    }
    

    public function update(Request $request, $id)
{
    $request->validate([
        'position' => 'required',
        'level' => 'required',
        'salary' => 'required',        
        'salaryType' => 'required',    
        'start_time' => 'required', // Add validation for start_time
        'end_time' => 'required',   // Add validation for end_time
    ]);

    // Find the admin record from the database based on the $id
    $admin = User::findOrFail($id);

    // Update the admin record with the form data
    $admin->update([
        'position_id' => $request->input('position'),
        'level_id' => $request->input('level'),
        'salary' => $request->input('salary'),
        'salary_type' => $request->input('salaryType'),
        'start_time' => $request->input('start_time'),
        'end_time' => $request->input('end_time'),
    ]);

    // Redirect to a success page or back to the edit form with a success message
    return redirect()->route('users.edit', $id)->with('success', 'Admin record updated successfully');
}




}
