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
    <div class="user-item">
      <img src="{{ asset ('images/'.$user->icon_image) }}" class="user-icon" alt="icon">

      <div class="user-name">{{ $user->username }}</div>

      <div class="follow-btn-area">
      </div>
    </div>
    @endforeach
  </div>


</x-login-layout>
