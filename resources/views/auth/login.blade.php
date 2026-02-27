<x-logout-layout>
  <div class="d-flex flex-column align-items-center">
    <div class="auth-card p-5 shadow-lg rounded-5 " style=" width: 100%; max-width: 400px; margin-top: -20px;">
      <h3 class="text-center mb-4 ">Atlasへようこそ</h3>

      {!! Form::open(['url' => '/login']) !!}

      <div class="mb-4">
        {{ Form::label('メールアドレス', null, ['class' => 'form-label']) }}
        {{ Form::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'メールアドレス']) }}
      </div>

      <div class="mb-4">
        {{ Form::label('パスワード', null, ['class' => 'form-label']) }}
        {{ Form::password('password', ['class' => 'form-control form-control-lg', 'placeholder' => 'パスワード']) }}
      </div>

      <div class="d-grid">
        {{ Form::submit('ログイン', ['class' => 'btn btn-danger btn-lg']) }}
      </div>

      <div class="text-center mt-4">
        <p><a href="/register">新規ユーザーの方はこちら</a></p>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</x-logout-layout>
