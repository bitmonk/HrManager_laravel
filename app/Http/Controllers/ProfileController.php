<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\bank_detail;
use App\Models\emergency_contact;
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
    // Validate the incoming request data
    $validatedData = $request->validate([
        'district' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'ward' => 'required|string|max:255',
        'zipcode' => 'required|string|max:20',
        'zone' => 'required|string|max:255',
    ]);

    // Find the authenticated user
    $user = User::findOrFail(Auth::user()->id);

    // Find or create the associated address
    $address = Address::firstOrNew(['u_id' => $user->id, 'type' => 'Permanent']);

    // Update attributes from the validated request data
    $address->district = $validatedData['district'];
    $address->city = $validatedData['city'];
    $address->tole = $validatedData['street'];
    $address->ward_no = $validatedData['ward'];
    $address->zipcode = $validatedData['zipcode'];
    $address->zone = $validatedData['zone'];
    $address->type = 'Permanent';

    // Save the updated address
    $address->save();

    // You can redirect to a success page or return a response as needed
    return redirect()->route('profile')->withSuccess('Profile updated successfully.');
}


public function payment(Request $request)
{
    // Validate the request data
    $request->validate([
        'b_name' => 'required',
        'acc_name' => 'required',
        'acc_no' => 'required',
    ]);

    $user = User::findOrFail(Auth::user()->id);

    // Check if the user already has bank details
    $bankDetails = bank_detail::where('u_id', $user->id)->first();

    if ($bankDetails) {
        // If bank details exist, update them
        $bankDetails->update([
            'bank_name' => $request->input('b_name'),
            'account_name' => $request->input('acc_name'),
            'account_number' => $request->input('acc_no'),
            // Update any other fields if needed
        ]);
    } else {
        // If no bank details exist, create a new record
        $bankDetails = new bank_detail([
            'u_id' => $user->id,
            'bank_name' => $request->input('b_name'),
            'account_name' => $request->input('acc_name'),
            'account_number' => $request->input('acc_no'),
            // Add any other fields
        ]);
        $bankDetails->save();
    }

    // Your other payment logic here

    return redirect()->route('profile.update')->with('success', 'Bank details updated successfully.');
}



public function emergency(Request $request)
{
    $user = User::findOrFail(Auth::user()->id);

    // Find or create the associated emergency contact
    $emergency = emergency_contact::firstOrNew(['u_id' => $user->id]);

    // Update attributes from the request
    $emergency->u_id = $user->id;
    $emergency->name = $request->input('name');
    $emergency->relation = $request->input('relation');
    $emergency->phone1 = $request->input('phone1');
    $emergency->phone2 = $request->input('phone2');

    // Save the updated emergency contact
    $emergency->save();

    // You can redirect to a success page or return a response as needed
    return redirect()->route('profile.update')->with('success', 'Emergency contact details updated successfully.');
}
}
