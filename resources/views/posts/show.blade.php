<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>試しに編集</title>
</head>
<body>
    <h1>{{ $post->name }}</h1>
    <p>{{ $post->content }}</p><br>
    <hr>
    <h2>コメント</h2>
    @if ($post->comments->isEmpty())
        <p>コメントはありません。</p>
    @else 
        <ul>
            @foreach ($post->comments as $comment)
                <li>
                    <strong>{{ $comment->author_name }}</strong>: {{ $comment->content }}
                    <br>
                    <small>投稿日:{{ $comment->created_at->format('Y-m-d H:1') }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>