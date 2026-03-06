<x-login-layout>

  <div class="follower-list bg-white">

    <div class="follower-header">
      <h2 class="mt-5 mb-5 me-4 fs-1 fw-strong">フォロワーリスト</h2>
      <div class="follower-icons-container">
        @foreach($follower_users as $user)
        <a href="{{ url('/profile/'.$user->id) }}">
          <img src="{{ $user->getIconUrl() }}" class="user-icon-list">
        </a>
        @endforeach
      </div>
    </div>

    <ul class="post-list">
      @foreach($posts as $post)
      <li class="post-item">
        <div class="post-left">
          <a href="{{ url('/profile/' . $post->user->id) }}">
            <img src="{{ $post->user->getIconUrl() }}" alt="icon" class="user-icon">
          </a>
        </div>

        <div class="post-right">
          <div class="post-info">
            <span class="user-name">{{ $post->user->username }}</span>
            <span class="post-date">{{ $post->created_at->format('Y-m-d H:i') }}</span>
          </div>

          <div class="post-content">
            {!! nl2br(e($post->post)) !!}
          </div>
        </div>
      </li>
      @endforeach
    </ul>

  </div>
</x-login-layout>
