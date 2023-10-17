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

    // public function __construct()
    // {
    //     $this->user = new User();
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::all();
        // return $user;
        return DB::table('users')->select('id', 'name', 'email', 'password')->get();
    }

    public function login(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Login successful');
        }

        return back()->with('error', 'Name or password is incorrect');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // if($user){
        //     return response()->json([
        //         'status' => 200,
        //         'message' => 'User added succesfully',
        //     ], 200);
        // }
        // else{
        //     return response()->json([
        //         'status' => 500,
        //         'message' => 'Something went wrong',
        //     ], 500);
        // }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}