<x-login-layout>

  <div class="container">
    <div class="d-flex align-items-center mb-3">
      <h2 class="me-4">フォローリスト</h2>
      <div class="follow-icons-container d-flex flex-wrap gap-2">
        @foreach($following_users as $user)
        <a href="{{ url('/profile/'.$user->id) }}">
          <img src="{{ asset('storage/' . $user->icon_image) }}" class="user-icon-list" alt="{{ $user->username }}">
        </a>
        @endforeach
      </div>
    </div>
    <hr>

    <div class="post-list">
      @foreach($posts as $post)
      <div class="post-item d-flex border-bottom p-3">
        <div class="post-icon me-3">
          <img src="{{ asset('storage/' .$post->user->icon_image) }}">
        </div>

        <div class="post-content">
          <div class="d-flex justify-content-between">
            <strong>{{ $post->user->username}}</strong>
            <small class="text-muted">{{ $post->created_at->format('Y-m-d H;i') }}</small>
          </div>
          <p class="mt-2">{{ $post->post }}</p>
        </div>
      </div>
      @endforeach
    </div>

  </div>

</x-login-layout>
