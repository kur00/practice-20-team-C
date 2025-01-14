<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>
    @if ($posts->isEmpty())
        <p>投稿がありません。</p>
    @else
        <ul>
        @foreach ($posts as $post)
            <li>
            <strong>{{ $post->name }}</strong><br>
            {{ $post->content }}
            </li>
        @endforeach
        </ul>
    @endif
</body>
</html>
