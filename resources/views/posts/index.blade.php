<x-login-layout>

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="post-container">
    <div class="post-icon">
      <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="user-icon">
    </div>

    <form action="{{ url('/post/create') }}" method="POST" class="post-form">
      @csrf
      <textarea name="newPost" placeholder="投稿内容を入力してください。" required></textarea>

      <button type="submit" class="post-btn">
        <img src="{{ asset('images/post.png') }}" alt="投稿">
      </button>
    </form>
  </div>

  <ul class="post-list">
    @foreach($posts as $post)
    <li class="post-item">
      <div class="post-left">
        <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="icon" class="user-icon">
      </div>

      <div class="post-right">
        <div class="post-info">
          <span class="user-name">{{ $post->user->username }}</span>
          <span class="post-date">{{ $post->created_at->format('Y-m-d H:i') }}</span>
        </div>

        <div class="post-content">
          {!! nl2br(e($post->post)) !!}
        </div>

        @if($post->user_id === Auth::id())
        <div class="post-actions">
          <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
            <img src="{{ asset('images/edit.png') }}" alt="編集"></a>

          <a href="" class="delete-btn" post_id="{{ $post->id }}">
            <img src="{{ asset('images/trash.png') }}" class="trash-normal" alt="削除">
            <img src="{{ asset('images/trash-h.png') }}" class="trash-hover" alt="削除">
          </a>
        </div>
        @endif
      </div>
    </li>
    @endforeach
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="{{ url('/post/update') }}" method="POST">
          @csrf
          <input type="hidden" name="id" class="modal_id">
          <textarea name="upPost" class="modal_post"></textarea>
          <div class="modal__button-area">
            <button type="submit" class="modal__update-btn">
              <img src="{{ asset('images/edit.png') }}" alt="更新">
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="modal js-modal-delete">
      <div class="modal__bg js-modal-delete-close"></div>
      <div class="modal__content">
        <p>この投稿を削除します。よろしいでしょうか？</p>
        <div class="modal__button-area">
          <a href="" class="btn btn-danger js-modal-delete-execute">OK</a>
          <a href="" class="btn btn-primary js-modal-delete-close">キャンセル</a>
        </div>
      </div>
    </div>

  </ul>

</x-login-layout>
