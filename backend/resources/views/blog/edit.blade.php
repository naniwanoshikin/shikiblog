@extends('layout')

@section('title', 'ブログ編集')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
            @csrf
            <!-- 更新機能用にidも送る -->
            <input type="hidden" name="id" value="{{ $blog->id }}">

            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $blog->title }}">
                @if ($errors->has('title'))
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="content">本文</label>
                <textarea id="content" name="content" class="form-control" rows="4">{{ $blog->content }}</textarea>
                @if ($errors->has('content'))
                <div class="text-danger">
                    {{ $errors->first('content') }}
                </div>
                @endif
            </div>

            <div class="mt-5">
                <a class="btn btn-secondary mr-3" href="/blog/{{ $blog->id }}">戻る</a>
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
        </form>
    </div>
</div>
<script>
    function checkSubmit() {
        // if (window.confirm('更新してよろしいですか？')) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
</script>
@endsection