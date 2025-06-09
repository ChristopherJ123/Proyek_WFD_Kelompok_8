<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Topic;
use App\Models\UserTopicFollowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class TopicController extends Controller
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
        return view('register-topic', [
            'genres' => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user()->id;

        $request->validate([
            'genre' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'icon' => [
                'nullable',
                File::image()
                    ->extensions('png,jpg,jpeg')
                    ->max(4096)
            ],
            'rules' => 'required|array|min:1',
            'rules.*.order' => 'required|numeric|max:20',
            'rules.*.title' => 'required|string|max:255',
            'rules.*.description' => 'nullable|string|max:1000',
        ]);

        $topic = new Topic();
        $topic->owner_id = $user;
        $topic->genre_id = $request->genre;
        $topic->name = $request->title;
        $topic->description = $request->description;
        if ($request->hasFile('icon'))
            $topic->icon_image_link = $request->icon->store('images');
        $topic->save();

        foreach ($request->rules as $rule) {
            $topic->rules()->create([
                'order' => $rule['order'],
                'title' => $rule['title'],
                'description' => $rule['description'],
            ]);
        }

        // Owner follows the topic automatically
        $topic->followers()->attach($topic->owner_id);
        // Owner becomes the topic moderator automatically
        $topic->moderators()->attach($topic->owner_id);

        dd($request->hasFile('icon'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
