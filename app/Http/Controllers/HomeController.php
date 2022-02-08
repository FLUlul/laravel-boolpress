<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* aggiungo questo use per utlizzare Auth */
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;

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

        $categories = Category::all();

        return view('pages.create', compact('categories'));
    }
    public function store(Request $request) {

        $data = $request -> validate([
            'title' => 'required|string|max:50',
            'subtitle' => 'nullable|string|max:100',
            'content' => 'required|string|max:255',
        ]);

        $data['author'] = Auth::user() -> name;

        $post = Post::make($data);
        $category = Category::findOrFail($request -> get('category'));

        $post ->category() -> associate($category);
        $post ->save();

        return redirect() -> route('posts');
    }
}
