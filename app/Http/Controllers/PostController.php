<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);

        return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'content' => 'required|max:255',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'content' => $request->content,
        ]);
      
        return redirect()->route('posts.index')->with('success', '投稿を作成しました！');
        
    }

}
