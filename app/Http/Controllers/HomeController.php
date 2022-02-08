<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* aggiungo questo use per utlizzare Auth */
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\Tag;

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
        $tags = Tag::all();

        return view('pages.create', compact('categories', 'tags'));
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

        $tags = Tag::findOrFail($request -> get('tags'));
        $post ->tags() -> attach($tags);
        $post ->save();

        return redirect() -> route('posts');
    }
}
