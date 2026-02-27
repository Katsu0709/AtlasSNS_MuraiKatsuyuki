<x-login-layout>
  <div class="profile-edit-wrapper">

    <div class="profile-edit-container">


      <div class="edit-user-icon">
        <img src="{{ asset('storage/' .$user->icon_image) }}" class="user-icon">
      </div>

      <div class="edit-form-area">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="edit-item row mb-5">
            <label class="col-sm-4 col-form-label fw-bold">ユーザー名</label>
            <div class="col-sm-8">
              <input type="text" name="username" class="form-control bg-light" value="{{ old('username', $user->username) }}">
            </div>
          </div>

          <div class="edit-item row mb-5">
            <label class="col-sm-4 col-form-label fw-bold">メールアドレス</label>
            <div class="col-sm-8">
              <input type="email" name="mail" class="form-control bg-light" value="{{ old('mail', $user->email) }}">
            </div>
          </div>

          <div class="edit-item row mb-5">
            <label class="col-sm-4 col-form-label fw-bold">パスワード</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control bg-light">
            </div>
          </div>

          <div class="edit-item row mb-5">
            <label class="col-sm-4 col-form-label fw-bold">パスワード確認</label>
            <div class="col-sm-8">
              <input type="password" name="password_confirmation" class="form-control bg-light">
            </div>
          </div>

          <div class="edit-item row mb-5">
            <label class="col-sm-4 col-form-label fw-bold">自己紹介</label>
            <div class="col-sm-8">
              <textarea name="bio" class="form-control bg-light" rows="3">{{ old('bio', $user->bio) }}</textarea>
            </div>
          </div>

          <div class="edit-item row mb-5">
            <label class="col-sm-4 col-form-label fw-bold">アイコン画像</label>
            <div class="col-sm-8">
              <div class="custom-file-upload bg-light border text-center py-4">
                <input type="file" name="icon_image" class="form-control-file d-none" id="icon_image">
                <label for="icon_image" class="mb-0 text-muted">ファイルを選択</label>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-danger update-btn">更新</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</x-login-layout>
