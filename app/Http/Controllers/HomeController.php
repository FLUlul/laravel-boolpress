<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* aggiungo questo use per utlizzare Auth */
use Illuminate\Support\Facades\Auth;

use App\Post;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function posts() {

        $posts = Post::orderBy('created_at', 'desc') ->get();

        return view('pages.posts', compact('posts'));
    }

    public function create() {

        return view('pages.create');
    }
    public function store(Request $request) {

        $data = $request -> validate([
            'title' => 'required|string|max:50',
            'subtitle' => 'nullable|string|max:100',
            'content' => 'required|string|max:255',
        ]);

        $data['author'] = Auth::user() -> name;

        Post::create($data);

        return redirect() -> route('posts');
    }
}
