<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事詳細</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800">{{ $post->name }}</h1>
        <p class="mt-4 text-gray-700">{{ $post->content }}</p>
        <hr class="my-6 border-gray-300">
<!-- 画像の表示 -->
        @if ($post->image)
            <div class="mt-6">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        @endif

        <h2 class="text-2xl font-semibold text-gray-800">コメント</h2>
        @if ($post->comments->isEmpty())
            <p class="mt-2 text-gray-600">コメントはありません。</p>
        @else 
            <ul class="mt-4 space-y-4">
                @foreach ($post->comments as $comment)
                    <li class="p-4 bg-gray-50 rounded-lg shadow">
                        <p class="font-semibold text-gray-700">{{ $comment->author_name }}</p>
                        <p class="text-gray-600">{{ $comment->content }}</p>
                        <small class="text-gray-500">投稿日: {{ $comment->created_at->format('Y-m-d H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
