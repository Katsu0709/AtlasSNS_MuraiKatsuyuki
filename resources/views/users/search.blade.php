<x-login-layout>

  <div class="search-container">
    <form action="{{ url('/search') }}" method="GET" class="search-form">
      <input type="text" name="keyword" class="search-input" placeholder="ユーザー名">
      <button type="submit" class="search-btn">
        <img src="{{ asset('images/search.png') }}" alt="検索">
      </button>
    </form>

    @if(!empty($keyword))
    <p class="search-word-display">検索ワード：{{ $keyword }}</p>
    @endif
  </div>

  <hr>

  <div class="users-list">
    @foreach($users as $user)
    <div class="user-item d-flex align-items-center justify-content-between mb-3">

      <div class="d-flex align-items-center">
        <img src="{{ asset('images/'.$user->icon_image) }}" class="user-icon" alt="icon">
        <span class="user-name">{{ $user->username }}</span>
      </div>

      <div class="follow-btn-area">
        @if(auth()->user()->isFollowing($user->id))
        <form action="{{ url('/unfollow') }}" method="POST">
          @csrf
          <input type="hidden" name="followed_id" value="{{ $user->id }}">
          <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="{{ url('/follow') }}" method="POST">
          @csrf
          <input type="hidden" name="followed_id" value="{{ $user->id }}">
          <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif
      </div>

    </div>
    @endforeach
  </div>

</x-login-layout>
