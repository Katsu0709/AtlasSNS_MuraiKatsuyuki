<x-login-layout>

  <div class="search-page-wrapper">

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


    <div class="users-list-wrapper">

      <div class="users-list">
        @foreach($users as $user)
        <div class="user-item">
          <div class="user-info">
            <img src="{{ asset('storage/'.$user->icon_image) }}" class="user-icon">
            <span class="user-name">{{ $user->username }}</span>
          </div>

          <div class="follow-btn-area">
            @if(auth()->user()->isFollowing($user->id))
            <form action="{{ url('/unfollow') }}" method="POST">
              @csrf
              <input type="hidden" name="followed_id" value="{{ $user->id }}">
              <button type="submit" class="btn btn-danger unfollow-btn">フォロー解除</button>
            </form>
            @else
            <form action="{{ url('/follow') }}" method="POST">
              @csrf
              <input type="hidden" name="followed_id" value="{{ $user->id }}">
              <button type="submit" class="btn btn-primary follow-btn">フォローする</button>
            </form>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</x-login-layout>
