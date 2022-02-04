<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function posts() {

        $posts = Post::all();

        return view('pages.posts', compact('posts'));
    }

    public function create() {

        return view('pages.create');
    }
    public function store(Request $request) {

        $data = $request -> validate([
            'title' => 'required|string|max:50',
            'author' => 'required|string|max:50',
            'subtitle' => 'nullable|string|max:100',
            'content' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'likes' => 'required|numeric|min:0'
        ]);

        Post::create($data);

        return redirect() -> route('posts');
    }
}
