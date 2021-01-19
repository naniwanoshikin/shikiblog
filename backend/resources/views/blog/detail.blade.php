@extends('layout')

@section('title', 'ブログ詳細')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>{{ $blog->title }}</h2>
        <p class="mb-0">作成日：{{ $blog->created_at }}</p>
        <p>更新日：{{ $blog->updated_at }}</p>
        <p>{{ $blog->content }}</p>
        <a class="btn btn-secondary mr-3" href="{{ route('blogs') }}">戻る</a>
        <a class="btn btn-primary" href="/blog/edit/{{ $blog->id }}">編集</a>
    </div>
</div>
@endsection