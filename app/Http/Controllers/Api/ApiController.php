<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //Register Api (POST)
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','lowercase','email','unique:users'],
            'password' => ['required','confirmed']

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);

        return response()->json();
    }


    //Login Api (POST)
    public function login(Request $request)
    {

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
