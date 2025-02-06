<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content','user_id','image'];

    //コメントのリレーション
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);  // 1つの投稿は複数のコメントを持つ
    }
    public function user()
    {
        return $this->belongsTo(User::class); // 各投稿は1人のユーザーに属する
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class); // 投稿は複数のタグを持つ、タグは複数の投稿を持つ
    }

}
