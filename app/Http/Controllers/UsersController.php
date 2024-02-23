<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\position;
use App\Models\salary;
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

        foreach ($temporaryAddresses as $temporaryAddress) {
            $city = $temporaryAddress->city;
            $district = $temporaryAddress->district;
            $street = $temporaryAddress->tole;
            $zipcode = $temporaryAddress->zipcode;
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
        
        if ($user) {
            // Access salary information
            $salaries = $user->salary;
        
            if ($salaries && $salaries->count() > 0) {
                foreach ($salaries as $sal) {
                    // Access salary details
                    $amount = $sal->salary;
                    $salaryType = $sal->salary_type; // Assuming you have a SalaryType model
                }
            } else {
                $amount = 'Unassigned';
                $salaryType = 'Unassigned';
            }
        } else {
            // Handle the case where the user is not found
            $amount = 'User not found';
            $salaryType = 'User not found';
        }
        



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
        'salaryType'
    ));
    }
}
