<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->get();
        if ($user) {
            foreach ($user as $key) {
                if (Hash::check($request->password, $key->password)) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'User Login succesfully',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Password is incorrect',
                    ], 500);
                }
            }
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Email is incorrect',
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => 'User added succesfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Just controlling the api system, no real database actions
        return response()->json([
            'status' => 200,
            'message' => 'User update succesfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}