<x-login-layout>

  <div class="follow-list bg-white">

    <div class="follow-header">
      <h2 class="mt-5 mb-5 me-4 fs-1 fw-strong">フォローリスト</h2>
      <div class="follow-icons-container">
        @foreach($following_users as $user)
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
