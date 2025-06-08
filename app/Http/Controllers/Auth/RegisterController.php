<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {

    // man this thing is killing me
    // aint gon lie https://www.youtube.com/watch?v=tBdLO8u-0L8 this OST slap hard
    
    public function create() {
        return view('register-user');
    }

    public function store(Request $request) {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'],
            'email' => ['required', 'lowercase', 'email', 'unique:users,email'],
            'birth_date' => ['required', 'date'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $memberRoleId = Role::where('name', 'member')->value('id');

        
        User::create([
            'role_id' => $memberRoleId ?? 1,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'birth_date' => $request->birth_date,
        ]);
        
        return redirect()->route('login')->with('success', 'Account created! Please log in.');
    }
    
}