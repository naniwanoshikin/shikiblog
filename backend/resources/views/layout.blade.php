<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- csrf対策 -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Laravel8用 Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- css読み込み -->
  @if(app('env') == 'production')
  <!-- 本番用 -->
  <link rel="stylesheet" href="{{ secure_asset('/css/app.css') }}">
  @else
  <!-- ローカル用 -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @endif
  <script src="/js/app.js" defer></script>
  <title>@yield('title')</title>
</head>

<body>
  <header>
    @include('header')
  </header>
  <br>
  <div class="container">
    @yield('content')
  </div>
  <footer class="footer bg-dark fixed-bottom">
    @include('footer')
  </footer>
</body>

</html>