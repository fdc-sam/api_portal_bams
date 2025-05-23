<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

class AuthController extends Controller {
    // Handles user registration
    public function register(Request $request) {

        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            "first_name"  =>   "required",
            "last_name"  =>   "required",
            "username"  =>   "required",
            "country_code"  =>   "required",
            "phone"  =>   "required",
            "email" =>  "required|email",
            "password"  =>   "required",
            "confirm_password"  =>   "required|same:password", // Must match 'password'
            "user_type"  =>   "required",
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation errors.",
                "data" => $validator->errors()->all()
            ]);
        }

        // Create a new user with hashed password
        $user = User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "username" => $request->username,
            "country_code" => $request->country_code,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => bcrypt($request->password), // Securely hash the password
            "user_type" =>  $request->user_type,
        ]);

        // Generate token and prepare response data
        $response = [];
        $response["token"] = $user->createToken("MyApp")->plainTextToken;
        $response["first_name"] = $user->first_name;
        $response["last_name"] = $user->last_name;
        $response["username"] = $user->username;
        $response["email"] = $user->email;

        // Return success response
        return response()->json([
            "status" => 1,
            "message" => "User registered successfully.",
            "data" => $response
        ]);
    }

    public function login(Request $request){
        if(Auth::attempt(["username" => $request->username, "password" => $request->password])){
            $user = Auth::user();

            $response = [];
            $response["token"] = $user->createToken("MyApp")->plainTextToken;
            $response["first_name"] = $user->first_name;
            $response["last_name"] = $user->last_name;
            $response["username"] = $user->username;
            $response["email"] = $user->email;

            // Return success response
            return response()->json([
                "status" => 1,
                "message" => "User loged-in",
                "data" => $response
            ]);
        }

        // Return success response
        return response()->json([
            "status" => 1,
            "message" => "Authentication error",
            "data" => null
        ]);
    }


    // $.ajax({
    //     url: 'http://127.0.0.1:8000/api/logout',
    //     method: 'POST',
    //     headers: {
    //         'Authorization': 'Bearer YOUR_ACCESS_TOKEN',
    //         'Accept': 'application/json'
    //     },
    //     success: function(response) {
    //         console.log('Logout successful:', response);
    //     },
    //     error: function(xhr) {
    //         console.error('Logout failed:', xhr.responseText);
    //     }
    // });

    public function logout(Request $request){
        // Revoke the current access token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            "status" => 1,
            "message" => "User logged out successfully.",
        ]);
    }
}



