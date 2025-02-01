<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // タグモデルの設定
    protected $fillable = ['name']; // nameカラムを一括代入できるように設定

    // 投稿との多対多のリレーション
    public function posts()
    {
        return $this->belongsToMany(Post::class); // 投稿との多対多リレーション
    }
}

