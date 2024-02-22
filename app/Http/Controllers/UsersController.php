<?php

namespace App\Http\Controllers;

use App\Models\position;
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
        
        
        // You can customize the view file, for now, let's assume you have a user.show.blade.php
        return view('admin.view', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // You can customize the view file, for now, let's assume you have a user.edit.blade.php
        return view('admin.edit', compact('user'));
    }
}
