<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $credentials = [
            'username' => 'admin',
            'password' => 'Admin123*',
        ];

        Auth::attempt($credentials);

        $genres = Genre::all();
        return view('register-post-mockup', [
            'genres' => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'images.*' => [
                'nullable',
//                'mimes:png,jpg,jpeg',
                File::image()
                    ->extensions('png,jpg,jpeg')
                    ->min(128)
                    ->max(4096)
            ],
        ]);    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
