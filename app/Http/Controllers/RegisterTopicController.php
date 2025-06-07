<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class RegisterTopicController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        return view('register-topic-mockup', [
            'genres' => $genres,
        ]);
    }
}
