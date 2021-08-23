<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['auth', 'register']]);;
    }

    public function profile(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = auth()->attempt($credentials)) {
            return  response()->json([ 
                'errors' => [
                    'msg' => ['Incorrect username or password.']
                ]  
            ], 401);
        } else {
            return response()->json([
                'result' =>'OK',
                'username' => $username,
                'address' => $address,
                'message' => 'Logged in.', 
                'token' => $token
            ]);
        }
    
        // $data = "All Profiles";
        // return response()->json($data, 200);
    }

    public function profileAuth()
    {
        $data = "Profile Owner: " . Auth::user()->name;
        return response()->json($data, 200);
    }
}
