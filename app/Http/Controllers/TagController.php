<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        // タグに関連する投稿を取得
        $posts = $tag->posts; // タグに関連する投稿を取得します

        // ビューを返す
        return view('tag.show', compact('tag', 'posts'));
    }
}

