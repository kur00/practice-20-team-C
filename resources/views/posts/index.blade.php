@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">掲示板</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- 投稿フォーム -->
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" placeholder="タイトル">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="3" placeholder="投稿内容を入力してください"></textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- タグ記入欄 -->
        <div class="mb-3">
            <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" placeholder="タグを入力（カンマで区切ってください）">
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- 画像入力欄 -->
        <div class="mb-3">
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">投稿</button>
    </form>

    <hr>
    <!-- 投群一覧 -->
    <h2>投稿一覧</h2>
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
            <p>{{ $post->content }}</p>
            <small class="text-muted">投稿者: {{  $post->user->name }} / 投稿日時: {{ $post->created_at->format('y-m-d H:i')}}</small>
            <br>
            <!-- タグの表示 -->
            @if ($post->tags->isNotEmpty())
                <p><small>タグ:</small>
                @foreach ($post->tags as $tag)
                <a href="{{ route('posts.searchByTag', ['tag' => $tag->name]) }}" class="badge bg-secondary text-decoration-none">{{ $tag->name }}</a>
                @endforeach
                </p>
            @else
                <p><small>タグ:</small> なし</p>
            @endif
            <a href="{{ route('post.show', $post) }}" class="btn btn-sm btn-outline-primary">投稿内容</a>
            </div>
        </div>
    @endforeach
</div>
@endsection