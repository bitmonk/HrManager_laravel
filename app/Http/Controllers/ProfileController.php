<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&]/|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone1 = $request->input('phone1');
        $user->phone2 = $request->input('phone2');
        $user->blood_group_id = $request->input('bloodGroup');
        $user->health_condition = $request->input('health');
        $user->position_id = $request->input('new-password');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }

    public function additionalTem(Request $request){
    // Find the authenticated user
    $user = User::findOrFail(Auth::user()->id);

    // Find or create the associated address
    $address = Address::firstOrNew(['u_id' => $user->id, 'type' => 'Temporary']);

    // Update attributes from the request
    $address->district = $request->input('district');
    $address->city = $request->input('city');
    $address->tole = $request->input('street');
    $address->ward_no = $request->input('ward');
    $address->zipcode = $request->input('zipcode');
    $address->zone = $request->input('zone');
    $address->type = 'Temporary';

    // Save the updated address
    $address->save();

    // You can redirect to a success page or return a response as needed
    return redirect()->route('profile')->withSuccess('Profile updated successfully.');
}


public function additionalPer(Request $request){
    // Find the authenticated user
    $user = User::findOrFail(Auth::user()->id);

    // Find or create the associated address
    $address = Address::firstOrNew(['u_id' => $user->id, 'type' => 'Permanent']);

    // Update attributes from the request
    $address->district = $request->input('district');
    $address->city = $request->input('city');
    $address->tole = $request->input('street');
    $address->ward_no = $request->input('ward');
    $address->zipcode = $request->input('zipcode');
    $address->zone = $request->input('zone');
    $address->type = 'Permanent';

    // Save the updated address
    $address->save();

    // You can redirect to a success page or return a response as needed
    return redirect()->route('profile')->withSuccess('Profile updated successfully.');
}
}
