<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['author_name', 'content', 'post_id'];

    //投稿のリレーション
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

}

