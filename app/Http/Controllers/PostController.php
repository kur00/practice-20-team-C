<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|string',
        ]);

        // 画像がアップロードされていれば保存
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // 'public'ディスクに保存
        }
  

        // 投稿の作成
        $post = Post::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'content' => $request->content,
            'image' => $imagePath, // 画像パスを保存
        ]);

        // タグ処理
        if ($request->tags) {
            $tags = explode(',', $request->tags); // カンマで分割してタグを配列に
            foreach ($tags as $tag) {
                $tag = trim($tag); // タグの前後の空白を削除
                $tagRecord = Tag::firstOrCreate(['name' => $tag]); // 存在すれば取得、なければ新規作成
                $post->tags()->attach($tagRecord->id); // 投稿とタグを関連付け
            }
        }
 
        return redirect()->route('posts.index')->with('success', '投稿を作成しました！');
        
    }

}
