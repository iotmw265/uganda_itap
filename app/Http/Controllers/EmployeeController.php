<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{


    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $users =User::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the form data
        $request->validate([
            'name' => 'min:3',
            'email' => 'email',

        ]);
        $validatedData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone,
            'user_role_name'=> $request->user_role_name
            //'password' => Hash::make($request->password),
            //'total_web_logins' => $total_web_logins,

        ];

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        // Update employee details
        $user->update($validatedData);

        return redirect()->route('users.edit', $id)->with('success', 'User details updated successfully!');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = [];

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        // Update employee details
        $user->update($validatedData);

        return redirect()->route('users.change.password', $id)->with('success', 'User password updated successfully!');
    }

    
    public function updateViewPassword($id)
    {
        $users =User::findOrFail($id);
        return view('users.change_password', compact('users'));
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'=>$request->phone,
            'user_role_name'=>$request->user_role_name
        ]);

        Session::flash('success', 'Registration successful!');

        // Redirect to the desired location after registration
        return view('auth.register');
    }


}
