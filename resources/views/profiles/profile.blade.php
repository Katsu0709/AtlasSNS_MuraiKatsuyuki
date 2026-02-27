<x-login-layout>
  <div class="profile-page-container">

    <div class="profile-header-area">
      <div class="profile-info-content">

        <div class="profile-icon-box">
          <img src="{{ asset('storage/' .$user->icon_image) }}" class="user-icon">
        </div>

        <div class="profile-details">
          <div class="profile-row">
            <span class="profile-label">ユーザー名</span>
            <span class="profile-value">{{ $user->username }}</span>
          </div>
          <div class="profile-row mt-4">
            <span class="profile-label">自己紹介</span>
            <span class="profile-value">{{ $user->bio ?? '自己紹介はまだありません。' }}</span>
          </div>
        </div>

        <div class="profile-action">
          @if(auth()->id() !== $user->id)
          @if(auth()->user()->isFollowing($user->id))
          <form action="{{ route('unfollow') }}" method="POST">
            @csrf
            <input type="hidden" name="followed_id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-danger unfollow-btn">フォロー解除</button>
          </form>
          @else
          <form action="{{ route('follow') }}" method="POST">
            @csrf
            <input type="hidden" name="followed_id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-primary follow-btn">フォローする</button>
          </form>
          @endif
          @endif
        </div>

      </div>
    </div>

    <ul class="post-list">
      @foreach($posts as $post)
      <li class="post-item">
        <div class="post-left">
          <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="icon" class="user-icon">
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
