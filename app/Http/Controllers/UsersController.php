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

        $tasks = Task::all();
        $error = "task not found!";
        if ($tasks) {
        } else {
            $tasks = "Unassigned";
        }

        return view('admin.edit', compact('user', 'position', 'positionId', 'levelId', 'salaryType','amount',
        'salaryType','salaries', 'tasks','error'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'position' => 'required',
            'level' => 'required',
            'contractDuration' => 'required',
        ]);
    
        try {
            // Find the admin record from the database based on the $id
            $admin = User::findOrFail($id);
    
            // Update the admin record with the form data
            $admin->update([
                'position_id' => $request->input('position'),
                'level_id' => $request->input('level'),
                'contract_duration' => $request->input('contractDuration')
            ]);

            $salary = Salary::findOrFail($id);
            $salary ->update(
                ['u_id' => $id], // Find or create based on user id
                [
                    'salary_type' => $request->input('salaryType'),
                    'salary' => $request->input('salary'),
                ]
            );
            
            
            return redirect()->route('users.edit', $id)->with('success', 'Admin record updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('users.edit', $id)->with('error', 'Error updating admin record: ' . $e->getMessage());
        }
    }
    


}
