<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Models\User;

class ApiController extends Controller
{
    public function registration(Request $request){
        try{
            $request->validate([
            'name' => 'required|string',
            'dob' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
            ]);

            $insertdata = ([
                "name" => $request->input('name'),
                "dob" => $request->input('dob'),
                "address" => $request->input('address'),
                "phone" => $request->input('phone'),
                "email" => $request->input('email'),
                "gender" => $request->input('gender'),
                "password" => Hash::make($request->input('password')),
            ]);

            User::create($insertdata);

            return response()->json(['success'=>true], 200);
        }
        catch(Exception $e){
            return response()->json(['success'=>false, 'error'=>$e->getMessage()], 500);
        }
    }
}
