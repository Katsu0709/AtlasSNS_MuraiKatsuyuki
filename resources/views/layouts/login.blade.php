<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar" class="p-4 border-start">
      <div id="confirm">
        <p class="mb-4">{{ Auth::user()->username }} さんの</p>

        <div class="row mb-4 align-items-center">
          <div class="col-6">フォロー数</div>
          {{ Auth::user()->follows()->count() }}人
        </div>
        <div class="text-end mb-4">
          <a href="{{ url('/follow-list') }}" class="btn btn-primary btn-sm px-4">フォローリスト</a>
        </div>

        <div class="row mb-4 align-items-center">
          <div class="col-6">フォロワー数</div>
          {{ Auth::user()->followers()->count() }}人
        </div>

        <div class="text-end mb-4">
          <a href="{{ url('/follower-list') }}" class="btn btn-primary btn-sm px-4">フォロワーリスト</a>
        </div>
      </div>

      <hr class="my-8">

      <div class="text-center">
        <a href="{{ url('/search') }}" class="btn btn-primary px-6">ユーザー検索</a>
      </div>
    </div>
  </div>
  <footer>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
