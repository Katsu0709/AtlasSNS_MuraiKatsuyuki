<x-logout-layout>
  <div class="d-flex flex-column align-items-center">
    <div class="auth-card p-5 shadow-lg rounded-5 text-center" style=" width: 100%; max-width: 400px; margin-top: -20px;">

      @if (session('username'))
      <h2 class="fw-bold text-white mb-2" style=" font-size: 2.5rem;">
        {{ session('username') }}<span style="font-size: 2rem;">さん</span>
      </h2>
      <p class="mb-5" style="font-size: 2rem; font-weight: bold;">ようこそ！ AtlasSNSへ</p>
      @endif

      <div class="text-white mt-4 mb-5" style="line-height: 2; font-size: 2rem; text-align: center;">
        <p class="mb-0" style="display: inline-block; text-align: left;">
          ユーザー登録が完了いたしました。<br>
          早速ログインをしてみましょう！
        </p>
      </div>

      <div class="text-center mt-4">
        <a href="/login" class="btn btn-danger btn-lg" style=" width:50%;">ログイン画面へ</a>
      </div>

    </div>
  </div>
</x-logout-layout>
