<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //Register Api (POST)
    public function register(Request $request)
    {
        //validation
        $request->validate([
            'name' => ['required'],
            'email' => ['required','lowercase','email','unique:users'],
            'password' => ['required','confirmed']

        ]);
        //create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);

        return response()->json(["status" => true , "message" => "User Created Successfully"]);
    }


    //Login Api (POST)
    public function login(Request $request)
    {
        //validation
        $request->validate([
            'email' => ['required' , 'email' ],
            'password' => ['required']
        ]);

        //check user login
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])) {

                $user = Auth::user();

                $token = $user->createToken('myToken')->accessToken;

                return response()->json(['status' => true , 'message' => 'Login Successfully' , 'token' => $token]);

        }else{

            return response()->json(['status' => false , 'message' => 'Invalid Login Details']);


        }

    }

    //Profile Api (GET)
    public function profile()
    {

    }


    //Logout Api (GET)
    public function logout()
    {

    }
}
