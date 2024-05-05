<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class CreateUsersController extends Controller
{
    public function createUserEntries(Request $request)
    {
        // Array of users data
        $usersData = [
            [
                'name' => 'iMoSyS',
                'email' => 'info@imosys.mw',
                'password' => '12345678'
            ]
            

            // Add more users as needed
        ];

        // Create entries in the users table
        foreach ($usersData as $userData) {
            // Create a new user instance
            $user = new User();
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = Hash::make($userData['password']);
            $user->email_verified_at = now();
            $user->remember_token = Str::random(10);
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();
        }

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Users created successfully'], 200);
    }
}