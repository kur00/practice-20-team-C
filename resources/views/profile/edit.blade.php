@extends('layouts.app')

@section('content')
<div class="container">
    <h1>プロフィール編集</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="profile_photo" class="form-label">プロフィール写真</label>
            <input type="file" name="profile_photo" id="profile_photo" class="form-control">
            @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" width="100" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label for="self_introduction" class="form-label">自己紹介</label>
            <textarea name="self_introduction" id="self_introduction" class="form-control" rows="4">{{ $user->self_introduction }}</textarea>
        </div>

        <div class="mt-3">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">投稿一覧に戻る</a>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
</div>
@endsection
