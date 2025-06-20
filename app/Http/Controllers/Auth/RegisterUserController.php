<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterUserController extends Controller {

    // man this thing is killing me
    // aint gon lie https://www.youtube.com/watch?v=tBdLO8u-0L8 this OST slap hard

    public function create() {
        $genres = Genre::all();
        return view('register-user', compact('genres'));
    }

    public function store(Request $request) {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9_-]+$/', 'unique:users,username,'],
            'email' => ['required', 'email', 'unique:users,email'],
            'birth_date' => ['required', 'date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'username.regex' => 'The username may only contain letters, numbers, underscores, or dashes.',
        ]);

        $memberRoleId = Role::where('name', 'user')->value('id');

        // Role 1 = member
        $user = User::create([
            'role_id' => $memberRoleId ?? 1,
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'birth_date' => $request->birth_date,
        ]);

        if ($request->has('genres')) {
            $user->genres()->attach($request->genres);
        }

        event(new Registered($user));

        // Langsung login
        Auth::login($user);

        return redirect()->route('dashboard');
    }

}
