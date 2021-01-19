<!-- 継承 -->
@extends('layout')

@section('title', 'ブログ一覧')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h3 class="my-3 ml-3">ブログ一覧</h3>

        @if (session('err_msg'))
        <p class="text-danger">{{ session('err_msg') }}</p>
        @endif

        <table class="table table-striped">
            <tr>
                <th>タイトル</th>
                <th></th>
            </tr>
            <!-- ブログ一覧 -->
            @foreach ($blogs as $blog)
            <tr>
                <td class="px-2">
                    <a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a>
                    <p class="px-1 mb-0">{{ $blog->created_at }}</p>
                </td>
                <td>
                    <p>{{$blog->title}}</p>
                </td>

                @if(app('env') != 'production')
                <!-- idも一緒に送ってあげる -->
                <form method="POST" action="{{ route('delete', $blog->id) }}" onSubmit="return checkDelete()">
                    @csrf
                    <td class="px-1 py-1">
                        <button type="submit" class="btn btn-danger px-1" onClick="">削除</button>
                    </td>
                </form>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
    function checkDelete() {
        if (window.confirm('削除してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection