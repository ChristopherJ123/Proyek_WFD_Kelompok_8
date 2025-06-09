<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterUserController extends Controller {

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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $memberRoleId = Role::where('name', 'user')->value('id');

        $user = User::create([
            'role_id' => $memberRoleId ?? 1,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'birth_date' => $request->birth_date,
        ]);

        // Langsung login
        Auth::login($user);

        return redirect()->route('dashboard');
    }

}
