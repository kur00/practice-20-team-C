@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $tag->name }} に関連する投稿一覧</h2>

        @if ($posts->isEmpty())
            <p>このタグに関連する投稿はありません。</p>
        @else
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                        <small class="text-muted">
                            投稿者: {{ $post->user->name }} / 投稿日時: {{ $post->created_at->format('Y-m-d H:i') }}
                        </small>
                        <br>

                        <!-- タグの表示 -->
                        @if ($post->tags->isNotEmpty())
                            <p><small>タグ:</small>
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('tag.show', $tag->id) }}" class="badge bg-secondary">{{ $tag->name }}</a>
                            @endforeach
                            </p>
                        @else
                            <p><small>タグ:</small> なし</p>
                        @endif

                        <a href="{{ route('post.show', $post) }}" class="btn btn-sm btn-outline-primary">投稿内容</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
