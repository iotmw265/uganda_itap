<?php

namespace App\Http\Controllers;


use App\Helpers\UserSession;
use App\Mail\MailSender;
use App\Models\Pincode;
use App\Models\ServiceProvider;
use Carbon\Carbon;
use Exception;
use App\Helpers\Helper;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //


    public function loginAPI(Request $request) {
        $validationRules = [
            'password'  => 'required|string|min:8',
            'email' => 'required',
            'firebase_token'=> 'sometimes',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if($validator->fails()) {
            $validation_error = Helper::FirstValidationError($validator->errors()->toArray());
            return Helper::APIResponse(0, "{$validation_error}",422, ['errors'=> $validator->errors(), "payload"=> $request->all()]);
        }

        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                throw new Exception("Invalid Login Credentials");
            }

            $user = User::where("email", $request->email)->first();

            if(!empty($request->firebase_token)) {
                $user->firebase_token = $request->firebase_token;
                $user->save();
                $user->refresh();
            }

            # create authentication access token for the user
            $access_token = $user->createToken('auth_token')->plainTextToken;
            $token_type = 'Bearer';

            $session_token = "{$token_type} {$access_token}";

            $headers = [
                "Accept"=> "application/json",
                "Authorization"=> $session_token
            ];

            # Get user roles
//            $roles =  $user->getRoleNames();
//            if(!isset($roles[0])) {
//                $user->assignRole("Driver");
//            }
//            $user->save();
//            $user->refresh();
//
//            $role = $user->getRoleNames()[0];

            $loginData = compact('access_token', 'token_type', 'session_token', 'headers');

            # update user mobile app login counter
            $user->total_app_logins = (int) $user->total_app_logins + 1;
        }
        catch (Exception $exception) {
            return Helper::APIResponse(0, "{$exception->getMessage()}",424, ['errors'=> $exception->getMessage(), "payload"=> $request->all()]);
        }

        return Helper::APIResponse(1, "Login Successful", 201, $loginData);
    }
    public function logoutAPI(Request $request) {
        try {
            $tokens = $request->user()->tokens()->latest()->delete();
        }
        catch (Exception $exception) {
            return Helper::APIResponse(0, $exception->getMessage(), 400);
        }

        return Helper::APIResponse(1, "Logout Successful", 201);
    }

    public function userProfileAPI(Request $request) {
        try {
            $profile = $request->user();
        }
        catch (Exception $exception) {
            return Helper::APIResponse(0, "{$exception->getMessage()} ", 400);
        }

        $data = compact('profile');

        return Helper::APIResponse(1, "User profile retrieved", 200, $data);
    }
}
