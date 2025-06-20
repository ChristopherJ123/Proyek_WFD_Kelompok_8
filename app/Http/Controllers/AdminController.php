<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::query()->where('role_id', '=', '2')->get();

        return view('admin-dashboard', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string'
        ]);

        if (User::where('username', '=', $request->username)->exists()) {
            $user = User::where('username', '=', $request->username)->first();

            $user->role_id = 2;
            $user->save();

            return back()->with('success', 'User has been set to admin.');
        } else {
            return back()->with('warning', 'User is not found.');
        }
    }

    public function destroy(User $user)
    {
        $user->update(['role_id' => '1']);

        return back()->with('success', 'User has been removed of admin.');
    }
}
